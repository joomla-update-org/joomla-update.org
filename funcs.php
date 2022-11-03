<?php

function get_contents()
{
    $result = [];
    foreach (glob(__DIR__ . '/content_*.html') as $filename) {
        $result[] = str_replace('content_', '', basename($filename, '.html'));
    }
    return $result;
}

function file_get_contents_curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function savefile($fname, $val)
{
    if (!file_exists(dirname($fname))) {
        mkdir(dirname($fname), 0755, true);
    }

    $file = fopen($fname, 'w');
    fwrite($file, print_r($val, true));
    flush();
    fclose($file);
}

function xml_attribute($object, $attribute)
{
    if (isset($object[$attribute])) {
        return (string) $object[$attribute];
    }
}

function get_local_url($url)
{
    $tmp = explode('/', $url);
    $tmp[0] = THIS_URL_PROTOCOL;
    $tmp[2] = THIS_URL;
    return implode('/', $tmp);
}

function get_local_path($path)
{
    $tmp = explode('/', $path);
    $tmp[0] = PATH_ROOT;
    unset($tmp[1], $tmp[2]);
    $tmp = implode('/', $tmp);
    $tmp = str_replace('/', DIRECTORY_SEPARATOR, $tmp);
    return $tmp;
}

function get_extensionset($server, $path, $xml)
{
    $att = 'detailsurl';
    $urls = [];

    // get list
    foreach ($xml->children() as $child) {
        $detailsurl = (string)$child->attributes()->$att;

        if ($detailsurl) {
            if (!in_array($detailsurl, $urls)) {
                $urls[] = $detailsurl;
            }

            $child->attributes()->$att = get_local_url($detailsurl);
        }
    }

    // save list
    savefile(get_local_path($path), $xml->asXML());
    unset($xml);

    // parse list
    foreach ($urls as $url) {
        $xml_string = file_get_contents_curl($url);
        $xml_child = simplexml_load_string($xml_string);

        $xml_name = $xml_child->getName();
        if ($xml_name == 'extensionset') {
            get_extensionset($server, $url, $xml_child);
        } elseif ($xml_name == 'updates') {
            get_update($server, $url, $xml_child);
        }
    }
}

function get_update($server, $path, $xml)
{
    $files = [];

    // parse list
    foreach ($xml->children() as $child) {
        foreach ($child->downloads->downloadurl as $du) {
            $file = (string)$du[0];
            if (!in_array($file, $files)) {
                $files[] = $file;
            }

            if ($server['zip']) {
                $du[0] = get_local_url($file);
            }
        }
    }

    // save list
    savefile(get_local_path($path), $xml->asXML());
    unset($xml);

    // download files
    if ($server['zip']) {
        foreach ($files as $file) {
            $lfile = get_local_path($file);
            if (!file_exists($lfile)) {
                $file_content = file_get_contents_curl($file);
                savefile($lfile, $file_content);
                unset($file_content);
            }
        }
    }
}

function get_list($server)
{
    $xml_string = file_get_contents_curl($server['url']);
    $xml = simplexml_load_string($xml_string);

    $xml_name = $xml->getName();
    if ($xml_name == 'extensionset') {
        get_extensionset($server, $server['url'], $xml);
    } elseif ($xml_name == 'updates') {
        get_update($server, $server['url'], $xml);
    }
}

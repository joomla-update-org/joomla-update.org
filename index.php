<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('__EXEC', 1);
define('THIS_URL_PROTOCOL', 'http' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 's' : '') . ':');
define('THIS_URL', $_SERVER['HTTP_HOST']);
define('PATH_ROOT', __DIR__);

function get_local_url($url)
{
	$tmp = explode('/', $url);
	$tmp[0] = THIS_URL_PROTOCOL;
	$tmp[2] = THIS_URL;
	return implode('/', $tmp);
}

function get_contents()
{
    $result = [];
    foreach (glob(__DIR__ . '/content_*.html') as $filename)
    {
        $result[] = str_replace('content_', '', basename($filename, '.html'));
    }
    return $result;
}

include PATH_ROOT . DIRECTORY_SEPARATOR . 'servers.php';

?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo THIS_URL_PROTOCOL . '//' . THIS_URL . '/'; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Joomla! Alternative unofficial update server</title>
    <meta name="description" content="Alternative unofficial update server for Joomla!, language packs for Joomla!, some separately updating system extension Joomla!">
    <meta name="generator" content="Aleksey A. Morozov">
    <link href="favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <meta property="og:title" content="Joomla! Alternative unofficial update server" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo THIS_URL_PROTOCOL . '//' . THIS_URL . '/'; ?>" />
    <meta property="og:locale" content="ru_RU" />
    <meta property="og:description" content="Alternative unofficial update server for Joomla!, language packs for Joomla!, some separately updating system extension Joomla!" />
    <meta property="og:image" content="<?php echo THIS_URL_PROTOCOL . '//' . THIS_URL . '/favicon.png'; ?>" />
</head>
<body>
    <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 256 256" width="90"><path fill="#0D6FAC" d="M128 196.3c-11.3 0-21.9-2.7-31.3-7.6l-0.5 0.5c-8.2 8.2-21.5 8.2-29.7 0 -8.2-8.2-8.2-21.5 0-29.7l0.6-0.6c-0.8-1.6-1.6-3.3-2.3-5l-21.7-21.7 -1.9 1.9c-14.7 14.7-19.6 35.5-14.9 54.2C11.2 191.9 0 205.5 0 221.7 0 240.6 15.3 256 34.3 256c16.3 0 29.9-11.4 33.4-26.6 18.7 4.6 39.2-0.3 53.8-14.9l5-5 14.4-14.4C136.7 195.9 132.4 196.3 128 196.3z"/><path fill="#E22B29" d="M226.6 187.8c4.5-18.6-0.5-39.1-15-53.6l-5-5 -11-11.1c0.5 3.2 0.7 6.5 0.7 9.9 0 12-3.1 23.3-8.5 33.1 6.7 8.3 6.2 20.4-1.4 28.1 -8 8-20.8 8.2-29.1 0.6 -2.7 1.3-5.5 2.4-8.4 3.3l-19.4 19.5 1.9 1.9c15.4 15.4 37.4 20.1 56.8 14.1 3.2 15.7 17 27.4 33.6 27.4 18.9 0 34.2-15.3 34.2-34.3C256 204.4 243.2 190.1 226.6 187.8z"/><path fill="#F68E33" d="M255.7 34.3c0-18.9-15.3-34.3-34.2-34.3 -17.3 0-31.6 12.9-33.9 29.6 -19.3-5.7-41-0.9-56.2 14.4l-4.9 4.9 -12.3 12.3c4.5-0.9 9.1-1.4 13.9-1.4 11.2 0 21.7 2.7 31 7.4 8.2-6.1 19.9-5.4 27.3 2 7.4 7.4 8.1 18.9 2.2 27.1 2.4 4.5 4.2 9.3 5.5 14.3l15.6 15.6 2-2c15.1-15.1 19.9-36.7 14.4-55.9C242.7 66.1 255.7 51.7 255.7 34.3z"/><path fill="#5CA445" d="M121.5 43.9c-14.4-14.4-34.6-19.5-53.1-15.1C65.7 12.4 51.6 0 34.6 0 15.7 0 0.3 15.4 0.3 34.3c0 16.3 11.4 30 26.7 33.4 -5.8 19.4-1.1 41.2 14.2 56.5l4.9 4.9 15.7 15.7c-1.4-5.4-2.1-11.1-2.1-16.9 0-10.5 2.4-20.4 6.6-29.2 -8-8.2-8-21.4 0.2-29.6 7.9-7.9 20.4-8.2 28.6-1 3.4-1.9 7-3.5 10.8-4.8l17.6-17.6L121.5 43.9z"/><circle fill="#222222" cx="128" cy="128" r="63.4"/><path fill="#FFFFFF" d="M174 102.2c-2-0.9-4.4 0-5.3 2l-4.9 11.2C158.6 100.6 144.6 90 128 90c-21 0-38 17-38 38s17 38 38 38c2.2 0 4-1.8 4-4 0-2.2-1.8-4-4-4 -16.6 0-30-13.4-30-30s13.4-30 30-30c13.2 0 24.5 8.6 28.4 20.5l-11.5-5.3c-2-0.9-4.4 0-5.3 2 -0.9 2 0 4.5 2 5.4l20.1 9.4c2 0.9 4.4 0 5.3-2l8.9-20.3C176.9 105.5 176 103.1 174 102.2z"/></svg>
    <h1>Joomla! Alternative unofficial update server</h1>
    
    <?php
        $contents = get_contents();
        if (count($contents))
        {
            echo '<div class="tabs">';
            foreach ($contents as $key => $content)
            {
                echo '<input id="tab' . $key . '" type="radio" name="tabs"' . ($key == 0 ? ' checked="checked"': '') . '>';
                echo '<label for="tab' . $key . '">' . $content . '</label>';
            }
            echo '<div class="contents">';
            foreach ($contents as $key => $content)
            {
                echo '<div class="content">' . file_get_contents(__DIR__ . '/content_' . $content . '.html') . '</div>';
            }
            echo '</div></div>';
        }
        $count_servers = count($servers);
        for ( $i = 0; $i < $count_servers; $i++ )
        {
            $ns = get_local_url($servers[$i]['url']);
            echo '<div class="p"><span>' . $servers[$i]['name'] . ':</span><span class="pre"><a href="' . $ns . '" rel="nofollow">' . $ns . '</a></span></div>', "\n";
        }
    ?>
    
    <hr>

    <p class="small">&copy; <a href="https://alekvolsk.pw" target="_blank">Aleksey A. Morozov</a>. All right reserved. <br>This project does not have any commercial gain in any form. The source code of this project available on <a href="https://github.com/joomla-update-org/joomla-update.org" target="_blank">GitHub</a>.</p>
    <p class="small">«Joomla! Alternative update server» is not affiliated with or endorsed by The Joomla! Project™. Use of the Joomla!® name, symbol, logo and related trademarks is permitted under a limited license granted by Open Source Matters, Inc.</p>
    <p class="small">«Joomla! Alternative update server» and this site is not affiliated with or endorsed by The Joomla! Project™. Any products and services provided through this site are not supported or warrantied by The Joomla! Project or Open Source Matters, Inc. Use of the Joomla!® name, symbol, logo and related trademarks is permitted under a limited license granted by Open Source Matters, Inc.</p>
    <p class="small">If you want to support the development of this project: <a href="https://www.paypal.me/alekvolsk" target="_blank">PayPal</a>, <a href="https://money.yandex.ru/to/410011461392459" target="_blank">Yandex</a> 😉</p>
    
    <style>@font-face{font-family:'IBM Plex Sans';font-style:normal;font-weight:400;font-display:auto;src:url(/fonts/IBMPlexSans-Regular.woff2) format('woff2'),url(/fonts/IBMPlexSans-Regular.woff) format('woff');}@font-face{font-family:'IBM Plex Sans';font-style:normal;font-weight:300;font-display:auto;src:url(/fonts/IBMPlexSans-Light.woff2) format('woff2'),url(/fonts/IBMPlexSans-Light.woff) format('woff');}@font-face{font-family:'IBM Plex Sans';font-style:normal;font-weight:600;font-display:auto;src:url(/fonts/IBMPlexSans-SemiBold.woff2) format('woff2'),url(/fonts/IBMPlexSans-SemiBold.woff) format('woff');}*{box-sizing:border-box;margin:0;padding:0;border:none}::-moz-selection{background-color:#0d6fac;color:#fff;text-shadow:none}::selection{background-color:#0d6fac;color:#fff;text-shadow:none}html{font-family:'IBM Plex Sans',-apple-system,BlinkMacSystemFont,sans-serif;font-size:16px;line-height:1.6;font-weight:400;font-display:auto;color:#222}body{max-width:1200px;padding:50px 10px;background-color:#fff}@media (min-width:640px){body{padding:50px}}strong{font-weight:600}h1{margin:40px 0;font-size:40px;font-weight:300}a{color:#0d6fac;text-decoration:none}a:hover{color:#09507d;text-decoration:underline}.p:not(:first-child),p:not(:first-child){margin-top:20px}.p>span{display:inline-block;min-width:280px}.small,small{font-size:13px}hr{margin:40px 0;border-top:1px solid #f0f0f0}.pre{padding:10px 15px;max-width:100%;background-color:#f0f0f0}.contents{border-top:1px solid #f0f0f0;padding-top:30px}.contents .content{display:none}.tabs{position:relative}.tabs label{display:inline-block;position:relative;padding-right:38px;padding-bottom:14px;cursor:pointer;font-weight:600;text-transform:uppercase}.tabs label:hover{color:#0d6fac}.tabs input[type=radio]{position:absolute;opacity:0;z-index:-1}.tabs input[type=radio]:checked+label:after{position:absolute;content:'';bottom:0;left:0;right:38px;height:0;border-bottom:3px solid #0d6fac}.tabs input[type=radio]:nth-child(1):checked~.contents>.content:nth-child(1),.tabs input[type=radio]:nth-child(3):checked~.contents>.content:nth-child(2),.tabs input[type=radio]:nth-child(5):checked~.contents>.content:nth-child(3),.tabs input[type=radio]:nth-child(7):checked~.contents>.content:nth-child(4),.tabs input[type=radio]:nth-child(9):checked~.contents>.content:nth-child(5){display:block}</style>
    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter46570203 = new Ya.Metrika({ id:46570203, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <!-- /Yandex.Metrika counter -->
    <!-- Global site tag (gtag.js) - Google Analytics --> <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109364225-1"></script><script>window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-109364225-1');</script> <!-- /Global site tag (gtag.js) - Google Analytics -->
</body>
</html>

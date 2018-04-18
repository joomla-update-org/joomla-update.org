<?php

error_reporting(0);
ini_set('display_errors', 0);

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

include PATH_ROOT . DIRECTORY_SEPARATOR . 'servers.php';

?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo THIS_URL_PROTOCOL . '//' . THIS_URL . '/'; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Joomla! Alternative update server</title>
    <meta name="description" content="Alternative update server for Joomla!, language packs for Joomla!, some separately updating system extension Joomla!">
    <meta name="generator" content="Aleksey A. Morozov">
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500" rel="stylesheet">
    <style>*{box-sizing:border-box;margin:0;padding:0;border:none}::-moz-selection{background-color:#1b63a2;color:#fff;text-shadow:none}::selection{background-color:#1b63a2;color:#fff;text-shadow:none}html{font-family:Roboto,-apple-system,BlinkMacSystemFont,sans-serif;font-size:16px;line-height:1.4;font-weight:300;color:#222}strong{font-weight:500}body{max-width:1200px;padding:50px 10px;background-color:#fff}h1{margin-bottom:50px;font-size:40px;font-weight:300}a{color:#1b63a2;text-decoration:none}a:hover{color:#1a3867;text-decoration:underline}.p:not(:first-child),p:not(:first-child){margin-top:20px}.p>span{display:inline-block;min-width:260px}.small,small{font-size:13px}hr{margin:40px 0;border-top:1px solid #f0f0f0}.pre{padding:10px 15px;max-width:100%;background-color:#f0f0f0}@media (min-width:640px){body{padding:50px}}</style>
</head>
<body>
    <h1>Joomla! Alternative update server</h1>
    <p><strong>EN</strong></p>
    <p>Alternate <u>unofficial</u> update server for Joomla!, language packs for Joomla!, some separately updating system extension Joomla!.</p>
    <p>The update server was created as an alternative server for those who have for one reason or another unavailable updates from the official servers Amazon (e.g., Amazon's servers were blocked by the authorities in connection with the proposed placing on these servers illegal content).</p>
    <p>All the files on the server in automatic mode are replicated from the official servers and are completely safe. The replicas are checked daily, 4 times a day.</p>
    <p>You will need to manually specify an alternative update server in the settings of the component of Joomla!, and manually create an update server for other extensions.</p>
    <p>Using this update server, you take full responsibility for the fate of your website. The Creator of this service, shall not bear any responsibility to you for your use of the update server.</p>
    <p><br><strong>RU</strong></p>
    <p>Альтернативный <u>неофициальный</u> сервер обновления для Joomla!, языковые пакеты для Joomla!, некоторые отдельно обновляемые системные расширения Joomla!.</p>
    <p>Данный сервер обновлений был создан как альтернативный сервер для тех, кто по тем или иным причинам не имеет доступа к обновлениям с официальных серверов Amazon (например, сервера Amazon были заблокированы властями в связи с предполагаемым размещением на этих серверах нелегального контента).</p>
    <p>Все файлы обновлений на данном сервере в автоматическом режиме реплицируются с официальных серверов и полностью безопасны. Реплики проверяются ежедневно, 4 раза в день.</p>
    <p>Необходимо вручную указать альтернативный сервер обновления в настройках компонента Joomla! и вручную создать запись сервера обновления для других расширений.</p>
    <p>Используя этот сервер обновлений вы полностью берете на себя ответственность за судьбу вашего сайта. Создатель данного сервиса не несет перед вами никакой ответственности за использование вами данного сервера обновлений.</p>
    <hr>
    <p><strong>Copy these URL-addresses</strong> / <strong>Скопируйте эти URL-адреса</strong>:</p>
    <?php
        $count_servers = count($servers);
        for ( $i = 0; $i < $count_servers; $i++ )
        {
            $ns = get_local_url($servers[$i]['url']);
            echo '<div class="p"><span>' . $servers[$i]['name'] . ':</span><span class="pre"><a href="' . $ns . '" rel="nofollow">' . $ns . '</a></span></div>', "\n";
        }
    ?>
    <hr>
    <p><strong>EN</strong>&nbsp;&nbsp; It's okay if you don't trust this update server. You can always download the original updates from Github: <a href="https://github.com/joomla/joomla-cms/releases" target="_blank">https://github.com/joomla/joomla-cms/releases</a>.</p>
    <p><strong>RU</strong>&nbsp;&nbsp; Это нормально, если вы не доверяете этому серверу обновлений. Вы всегда можете скачать оригинальные обновления с Github: <a href="https://github.com/joomla/joomla-cms/releases" target="_blank">https://github.com/joomla/joomla-cms/releases</a>.</p>
    <hr>
    <p class="small">&copy; <a href="https://alekvolsk.pw" target="_blank">Aleksey A. Morozov</a>. All right reserved. <br>This project does not have any commercial gain in any form. The source code of this project available on <a href="https://github.com/AlekVolsk/joomla-update.org" target="_blank">Githab</a>.<br><a href="https://money.yandex.ru/to/410011461392459" target="_blank">Here everyone can provide financial support 😉</a></p>
    <p class="small">«https://joomla-update.org/» is not affiliated with or endorsed by The Joomla! Project™. Use of the Joomla!® name, symbol, logo and related trademarks is permitted under a limited license granted by Open Source Matters, Inc.</p>
    <p class="small">«Joomla! Alternative update server» and this site is not affiliated with or endorsed by The Joomla! Project™. Any products and services provided through this site are not supported or warrantied by The Joomla! Project or Open Source Matters, Inc. Use of the Joomla!® name, symbol, logo and related trademarks is permitted under a limited license granted by Open Source Matters, Inc.</p>
</body>
</html>

<?php

include __DIR__ . DIRECTORY_SEPARATOR . 'defines_cron.php';
include PATH_ROOT . DIRECTORY_SEPARATOR . 'funcs.php';
include PATH_ROOT . DIRECTORY_SEPARATOR . 'servers.php';

$count_servers = count($servers);
for ($i = 0; $i < $count_servers; $i++) {
    get_list($servers[$i]);
}

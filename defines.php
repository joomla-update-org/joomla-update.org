<?php

define('THIS_URL_PROTOCOL', 'http' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 's' : '') . ':');
define('THIS_URL', $_SERVER['HTTP_HOST']);
define('PATH_ROOT', __DIR__);

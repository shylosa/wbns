<?php

define('DEBUG', 1);
define('ROOT', dirname(__DIR__));
define('WWW', ROOT . '/public');
define('APP', ROOT . '/app');
define('CORE', ROOT . '/vendor/wbns/core');
define('LIBS', ROOT . '/vendor/wbns/core/libs');
define('CACHE', ROOT . '/tmp/cache');
define('CONF', ROOT . '/config');
define('LAYOUT', 'default');

//http://localhost:91/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
//http://localhost:91/
$app_path = preg_replace('#[^/]+$#', '', $app_path);
//http://localhost:91
$app_path = preg_replace('#/$#', '', $app_path);

define('PATH', $app_path);
define('ADMIN', PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';
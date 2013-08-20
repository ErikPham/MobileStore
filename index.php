<?php

$start = microtime(TRUE);
@session_start();
@ob_start();
define('SITE_PATH', realpath(dirname(__FILE__)) . '/');
define('URL', "http://mobilestore.com/");
define('Publics', URL . 'publics/');
define('HASH_GENERAL_KEY', 'MixitUp200');
define('HASH_PASSWORD_KEY', 'PhucPM');
define('SESSION_KEY', 'PhucPM');
require './config/config.php';
$imports = $config['import'];
$timezone = $config['timezone'];
date_default_timezone_set($timezone);

function __autoload($class) {
    require SITE_PATH . 'library/' . $class . ".php";
}

$app = new Bootstrap();
$app->import($imports);
$app->run();

$end = microtime(TRUE);
//echo $end - $start;
?>
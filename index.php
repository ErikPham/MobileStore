<?php
define('SITE_PATH', realpath(dirname(__FILE__)) . '/');
define('URL', "http://localhost/mobilestore/");
define('Publics',  URL . 'publics/');
define('HASH_GENERAL_KEY', 'MixitUp200');
define('HASH_PASSWORD_KEY', 'PhucPM');
require './config/config.php';
$imports = $config['import'];
date_default_timezone_set($config['timezone']);

echo date('d/m/Y H:i:s', time());

exit();
function __autoload($class) {
    require SITE_PATH . 'library/' . $class . ".php";
}
$app = new Bootstrap();
$app->import($imports);
$app->run();
?>

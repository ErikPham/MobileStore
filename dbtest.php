<?php
include './library/Captcha.php';
include './library/Session.php';
define('SESSION_KEY', 'PhucPM');
/*
include './library/Connection.php';
include './library/Model.php';

$model = new Model();
//
$data = array(
    'columns' => array('id', 'name'), 
    'st1' => array(1, 2), 
    'st2' => array(1, 3)
);

$insert = $model->formatInsertMultiple($data, 'user');
echo $insert;/*
 * 
 * 

echo strtotime('-1days') . '<br/>';
echo strtotime('-1weeks'). '<br/>';
echo strtotime('-1months'). '<br/>';
echo strtotime('-3months'). '<br/>';
*/
echo Captcha::getCaptcha();

?>

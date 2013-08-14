<?php

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
echo $insert;
?>

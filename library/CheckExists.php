<?php

class CheckExists {

    function __construct() {
        $this->model = new Model();
    }
    
    public function check($value, $name, $table){
        $options = array('where' => "$name = '$value'");
        return $this->model->checkExists($name, $table, $options);
    }

}

?>

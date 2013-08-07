<?php

class index_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    function getProductLatests() {
        $options = array('limit' => '10','order' => 'id DESC');
        return $this->selectAll(array('id', 'name', 'price', 'thumb'), 'products_temp_5', $options, null, MYSQLI_ASSOC);
    }
    
    function getProductHighPrices() {
        $options = array('limit' => '25','order' => 'price DESC');
        return $this->selectAll(array('id', 'name', 'price', 'thumb'), 'products_temp_5', $options, null, MYSQLI_ASSOC);
    }

}

?>

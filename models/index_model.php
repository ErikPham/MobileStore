<?php

class index_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    function getProductHighUp() {
        $options = array('where' => 'price > 10000', 'order' => 'price DESC');
        return $this->selectAll(array('id', 'name', 'price', 'thumb'), 'products', $options, null, MYSQLI_ASSOC);
    }

    function getProductMid() {
        $options = array('where' => 'price < 10000 and price > 4000', 'order' => 'price DESC');
        return $this->selectAll(array('id', 'name', 'price', 'thumb'), 'products', $options, null, MYSQLI_ASSOC);
    } 
    function getProductAppellative() {
         $options = array('where' => 'price < 4000', 'order' => 'price DESC');
        return $this->selectAll(array('id', 'name', 'price', 'thumb'), 'products', $options, null, MYSQLI_ASSOC);
    } 
	

}

?>

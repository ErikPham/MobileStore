<?php

class Product_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function getImage($id) {
        $options = array('where' => 'product_id =' . $id);
        return $this->selectAll('source', 'images join image_products on image_products.image_id = images.id', $options, null, 1);
    }
    
    function getDetailProduct($id){
        $options = array('where' => 'id =' . $id);
        return $this->selectOneRow('*', 'products', $options, null, 1);
    }

}

?>

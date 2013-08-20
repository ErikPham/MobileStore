<?php

class CheckOut_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function getInfoProduct($id) {
        $options = array('where' => "id = {$id}");
        return $this->selectOneRow('name, price, thumb', 'products', $options, null, 1);
    }

    function checkQuantity($id) {
        $options = array('where' => "id = {$id}");
        $data = $this->selectOneRow('quantity', 'products', $options, null, 2);
        return $data[0];
    }
    
    function getInfoCustomer($id){
        $options = array('where' => "id = {$id}");
        return $this->selectOneRow('fullname, email, mobile, address', 'accounts', $options, null, 1);
    }
    
    function addOrder($data){
        $id = '';
        if($this->insert($data, 'order')){
            $id = $this->getLastInsertID();
        }
        return $id;
            
    }
    
    function addOrderDetail($data){
        return $this->insert($data, 'order_detail', true);
    }
    
    function updateQuantiyProduct($data, $id){
        return $this->update($data, 'products', "id = {$id}");
    }
    
    function getPayment(){
        return $this->selectAllTable('id, name', 'payment', 1);
    }

}

?>

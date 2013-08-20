<?php

class ShoppingCart {

    private $cart_name;
    private $items;

    function __construct($name) {
        $this->cart_name = $name;
        $this->items = Session::get($this->cart_name);
    }

    public function hasItems() {
        $tmp = false;
        if (!empty($this->items)) {
            $tmp = true;
        }
        return $tmp;
    }

    public function hasItem($id) {
        $tmp = false;
        if (!empty($this->items[$id])) {
            $tmp = true;
        }
        return $tmp;
    }

    public function setItem($id, $info) {
        if($this->hasItem($id)){
            $quantity = $info['quantity'] + $this->getQuantity($id);
            $this->setQuantityItem($id, $quantity);
        }else{
            $this->items[$id] = $info;
        }
    }

    public function setQuantityItem($id, $quantity) {
        $this->items[$id]['quantity'] = $quantity;
    }

   
    public function getItems() {
        return $this->items;
    }

    public function getName($id) {
        $name = ($this->hasItem($id)) ? $this->items[$id]['name'] : "";
        return $name;
    }

    public function getImage($id) {
        $image = ($this->hasItem($id)) ? $this->items[$id]['image'] : "";
        return $image;
    }

    public function getQuantity($id) {
        $quantity = ($this->hasItem($id)) ? $this->items[$id]['quantity'] : 0;
        return $quantity;
    }

    public function getPrice($id) {
        $price = ($this->hasItem($id)) ? $this->items[$id]['price'] : 0;
        return $price;
    }

    public function getTotalPrice() {
        $total = 0;
        if ($this->hasItems()) {
            foreach ($this->items as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }
    
    public function getTotalQuantity(){
        $total = 0;
        if($this->hasItems()){
            foreach ($this->items as $item) {
                $total += $item['quantity'];
            }
        }
        return $total;
    }

   
    public function deleteItem($id) {
        if ($this->hasItem($id)) {
            unset($this->items[$id]);
        }
    }

    public function deleteCart() {
        if($this->hasItems()){
            $this->items = array();
            $this->saveCart();
        }
    }
    
    private function clean(){
        foreach ($this->items as $id=>$item) {
            if($item['quantity'] < 1){
                unset($this->items[$id]);
            }
        }
    }

    public function saveCart(){
        $this->clean();
        Session::set($this->cart_name, $this->items);
    }

}

?>

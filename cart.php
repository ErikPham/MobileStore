<?php
session_start();
define('SESSION_KEY', 'PhucPM');
include './library/Session.php';
include './library/ShoppingCart.php';
$cart = new ShoppingCart('cart');

echo $cart->getTotalPrice();
echo "<pre>";
print_r($cart->getItems());
//$cart->setItem('3', array('quantity' => 1, 'price' => 20, 'image' => '1.jpg'));
//$cart->saveCart();

?>

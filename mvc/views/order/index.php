<?php 
session_start();
$cart = array(
    array('name'=>'San pham 1', 'id'=> 1, 'price'=> 35000),
    array('name'=>'San pham 2', 'id'=> 2, 'price'=> 30000),
    array('name'=>'San pham 3', 'id'=> 3, 'price'=> 36000),
    array('name'=>'San pham 4', 'id'=> 4, 'price'=> 30000),
);
$_SESSION['cart'] = $cart;
print_r($result);
print_r($orders);

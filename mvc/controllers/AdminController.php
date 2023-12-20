<?php 
require_once dirname(__DIR__) . "/models/Product.php";
require_once dirname(__DIR__) . "/core/functions.php";

class AdminController {
    function index($params){
        $product = new Product();
        $products = $product->getAllProduct();
        view("admin/index",compact('products'));

    }
}
?>
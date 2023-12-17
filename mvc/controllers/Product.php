<?php
require_once dirname(__DIR__) . "/models/ProductModel.php";
require_once dirname(__DIR__) . "/core/functions.php";
class Product
{
    public function getAllProduct()
    {
        $product = new Products;
        $product->getAllProduct();
        $products = $product->getAllProduct();
        view('products/index', compact('products'));
    }
    public function getOneProduct($id){
        $product = new Product();
        $product->getOneProduct($id);
        $product = $product->getOneProduct($id);
        view('products/index', compact('products'));
    }
}

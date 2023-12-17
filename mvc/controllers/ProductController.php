<?php
require_once dirname(__DIR__) . "/models/Product.php";
require_once dirname(__DIR__) . "/core/functions.php";

class ProductController 
{
    public function index()
    {
        $product = new Product();
        $products = $product->getAllProduct();
        view('products/index', compact('products'));
    }
    public function show($params){
        $id = $params[0];
        $productModel = new Product();
        $products = $productModel->getAllProduct();
        $product = $productModel->getOne($id);
        view('products/show', compact('product','products'));   
    }
}

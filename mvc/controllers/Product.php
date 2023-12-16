<?php
require_once dirname(__DIR__) . "/models/ProductModel.php";
require_once dirname(__DIR__) . "/core/functions.php";
class Product
{
    public function getProduct()
    {
        $product = new ProductModel();
        $product->getAllProduct();
        $products = $product->getAllProduct();
        view('products/index', compact('products'));
    }
    public function getOneProduct($id){
         $product = new ProductDetailModel();
        $product->getOneProduct($id);
        $products = $product->getOneProduct($id);
        view('products/index', compact('products'));
    }
}

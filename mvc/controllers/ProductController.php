<?php
require_once dirname(__DIR__) . "/models/Product.php";


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
    public  function search($keyword){
        $search_key="";
        $keyword = isset($_POST['key']) ? htmlspecialchars($_POST['key']) : '';
        $productModel =new Product();
        $searchResult = $productModel->search($keyword);
        if (!empty($keyword)) {
            if (empty($searchResult)) {
                $search_key = "<p>No results found for: " . htmlspecialchars($keyword) . "</p>";
            } else {
                $search_key = "<p>Showing results for: " . htmlspecialchars($keyword) . "</p>";
            }
        }
}
}

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
        if(isset($_GET['id'])&&($_GET['id']>-0)){
            $id=$_GET['id'];
    //   $id = $params[0];
        $productModel = new Product();
        $products = $productModel->getAllProduct();
        $product = $productModel->getOne($id);
        view('products/show', compact('product','products'));   
    }
}
    public  function search($keyword){
        $search_key="";
        $keyword = isset($_POST['key']) ? htmlspecialchars($_POST['key']) : '';
        $productModel = new Product();
        $searchResult = $productModel->search($keyword);
        if (!empty($keyword)) {
            if (empty($searchResult)) {
                $search_key = "No results : " . htmlspecialchars($keyword)  ;
            } else {
                $search_key =  htmlspecialchars($keyword) ;
            }
        }
        view('products/search', compact('searchResult', 'keyword','search_key'));
    }
        function product(){
           
        $product = new Product();
        $products = $product->getAllProduct();
        view('products/product', compact('products'));
        }
}

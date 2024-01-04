<?php
require_once dirname(__DIR__) . "/models/Product.php";
require_once dirname(__DIR__) . "/models/Shop.php";

class ProductController 
{
    public function index()
    {
        $product = new Product();
        $products = $product->getAllProduct();
        $shopModel = new Shop();
        $resultShop = $shopModel->getShop();
        view('products/index', compact('products', 'resultShop'));
    }
    public function show($params){
        $shopModel = new Shop();
        $resultShop = $shopModel->getShop();
        if(isset($_GET['id'])&&($_GET['id']>-0)){
            $id=$_GET['id'];
    //   $id = $params[0];
        $productModel = new Product();
        $products = $productModel->getAllProduct();
        $product = $productModel->getOne($id);
        view('products/show', compact('product','products', 'resultShop'));   
    }
}
    public  function search($keyword){
        $shopModel = new Shop();
        $resultShop = $shopModel->getShop();
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
        view('products/search', compact('searchResult', 'keyword','search_key','resultShop'));
    }
   
}

<?php
require_once dirname(__DIR__) . "/models/Product.php";
require_once dirname(__DIR__) . "/models/Shop.php";
require_once dirname(__DIR__) . "/models/Comment.php";


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
    public function show($params)
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $productModel = new Product();
            $products = $productModel->getAllProduct();
            $product = $productModel->getOne($id);
            $comment = new Comment();
            $comments = $comment->getComments($id);
            view('products/show', compact('product', 'products', 'comments'));
        }
    }
    public  function search($keyword)
    {   
        $shopModel = new Shop();
        $resultShop = $shopModel->getShop();
        $search_key = "";
        $keyword = isset($_POST['key']) ? htmlspecialchars($_POST['key']) : '';
        $productModel = new Product();
        $searchResult = $productModel->search($keyword);
        if (!empty($keyword)) {
            if (empty($searchResult)) {
                $search_key = "No results ";
                $search_key = "No results : " . htmlspecialchars($keyword);

                view('error/error', compact('search_key'));
            } else {
                $search_key =  htmlspecialchars($keyword);
            }
        }
        view('products/search', compact('searchResult', 'keyword', 'search_key', 'resultShop'));
    }
    
    function product()
    {

        $product = new Product();
        $products = $product->getAllProduct();
        view('products/product', compact('products'));
    }
}

<?php 
    require_once dirname(__DIR__). "/models/User.php";
    require_once dirname(__DIR__). "/core/functions.php";
    require_once dirname(__DIR__). "/models/Product.php";
    class HomeController {
        function index(){
            $productModel =new Product();
            $productModel->popular();
            $resultPopular=  $productModel->popular();
            view("home/index",compact('resultPopular'));
        }
    }
?>
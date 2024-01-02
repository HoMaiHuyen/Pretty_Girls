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

        function AboutUs($page){
            view('about-us/about-us', compact($page));
        }
        function admin(){
            view('admin/index');
        }
    }
?>
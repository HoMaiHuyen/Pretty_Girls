<?php
require_once dirname(__DIR__) . "/models/User.php";
require_once dirname(__DIR__) . "/core/functions.php";
require_once dirname(__DIR__) . "/models/Product.php";
require_once dirname(__DIR__) . "/models/Shop.php";

class HomeController
{
    function index()
    {
        $productModel = new Product();
        $productModel->popular();
        $resultPopular =  $productModel->popular();
        $shopModel = new Shop();
        $resultShop = $shopModel->getShop();
        view("home/index", compact('resultPopular', 'resultShop'));
    }

    function AboutUs($page)
    {
        $shopModel = new Shop();
        $resultShop = $shopModel->getShop();
        view('about-us/about-us', compact($page, 'resultShop'));
    }
    function admin()
    {
        view('admin/index');
    }
}

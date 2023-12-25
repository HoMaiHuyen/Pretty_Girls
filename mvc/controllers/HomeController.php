<?php 
    require_once dirname(__DIR__). "/models/User.php";
    require_once dirname(__DIR__). "/core/functions.php";
    class HomeController {

        function index($params){
           $user = new User();
           $user->getAll();
           $result = $user->getAll();
            view("home/index",compact('result'));

        }
        function AboutUs($page){
            view('about-us/about-us', compact($page));
        }
    }
?>
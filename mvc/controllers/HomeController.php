<?php 
    require_once dirname(__DIR__). "/models/User.php";
    require_once dirname(__DIR__). "/core/functions.php";
    class HomeController {


        function AboutUs($page){
            view('about-us/about-us', compact($page));
        }
    }
?>
<?php 
    require_once dirname(__DIR__). "/models/User.php";
    require_once dirname(__DIR__). "/core/functions.php";
    class HomeController {

        function sayHi($params){
           $c = 1000+3;
           $d = 10/2;
        //    $model= new Model();
        $user = new User();
        $user->getAll();
        $result = $user->getAll();

        view("home/index",compact('result'));


        }
        function show(){
            echo "Home - Show";
        }
    }
?>
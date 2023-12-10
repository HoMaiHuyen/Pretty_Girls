<?php 
   require_once dirname(__DIR__). "/core/functions.php";
    class Home {

        function sayHi($params){
           $c = 1000+3;
           $d = 10/2;
           
            view("home/index",compact('c','d'));


        }
        function show(){
            echo "Home - Show";
        }
    }
?>
<?php 
function view($view, $data){
    extract($data);

    require_once dirname(__DIR__)."/views/".$view.".php";
    
     
}



?>
<?php 
function view($view, $data){
    extract($data);

    require_once dirname(__DIR__)."/views/".$view.".php";
    
     
}
function loadImage($image){
    echo  ROOT_URL .'/public/image/'.$image;
}


?>
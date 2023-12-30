<?php
require_once dirname(dirname(__DIR__)).'/models/User.php';
class AuthAdminMiddleware{

     public function __construct()
      {
            $this->check();
      }  
      public function check(){
           
            if(empty($_SESSION['user_id'])){
                header('Location:' .$_ENV['ROOT_URL'].'/Home/AboutUs');
                exit();
            } 
            $userModel = new User();
            $user= $userModel->getOneUser($_SESSION['user_id']);
            if(empty($user)){
                header('Location:' .$_ENV['ROOT_URL'].'/Home/AboutUs');
                exit();
            }
            if($user['role']!='admin'){
                 header('Location:' .$_ENV['ROOT_URL'].'/Home/AboutUs');
                exit();
            }
            
            
            

      }
}
?>
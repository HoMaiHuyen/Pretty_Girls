<?php 
require_once dirname(dirname(__DIR__)).'/models/User.php';
class AuthMiddleware{
      public function __construct()
      {
            $this->check();
      }  
      public function check(){
           
            if(empty($_SESSION['user']['user_id'])){
                header('Location:' .$_ENV['ROOT_URL'].'/Home/index');
                exit();
            } 
            $userModel = new User();
            $user= $userModel->getOneUser($_SESSION['user']['user_id']);
            if(empty($user)){
                header('Location:' .$_ENV['ROOT_URL'].'/Home/index');
                exit();
            }
            
            

      }
}

?>
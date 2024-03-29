<?php 
require_once dirname(dirname(__DIR__)).'/models/User.php';
class AuthMiddleware{
      public function __construct()
      {
            $this->check();
      }  
      public function check(){
            if(empty($_SESSION['user']['id'])){
                header('Location:' .$_ENV['ROOT_URL'].'/Home/index');
                setcookie('unlogin', 'You have to register or login', time() + 1, "/", "", 0);
                exit();
            } 
            $userModel = new User();
            $user= $userModel->getOneUser($_SESSION['user']['id']);
            if(empty($user)){
                header('Location:' .$_ENV['ROOT_URL'].'/Home/index');
                 setcookie('unlogin', 'You have to register or login', time() + 1, "/", "", 0);
                exit();
            }
      }
}

?>
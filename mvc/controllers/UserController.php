<?php 
require_once dirname(__DIR__) . "/models/User.php";
require_once dirname(__DIR__). "/core/functions.php";
class UserController  {
    public function show($params){
        $id = $params[0];
        $user=new User();
        $result = $user->getOneUser($id);  
        $orders= $user->getOrders($id);
        view('user-profile/profile',compact('result','orders'));
    }
    public function updateUser(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'] ;
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $nameClear = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $emailClear=htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

            $address = isset($_POST['address']) ? $_POST['address'] : '';
            $addressClear =htmlspecialchars($address, ENT_QUOTES, 'UTF-8');

            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $passwordClear = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
            $phoneClear = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
            $user= new User();
           $result= $user->updateUser($id,$nameClear, $phoneClear, $emailClear, $addressClear, $passwordClear);  
            if ($result !== false) {
            header("Location:/project1/User/show/$id");
            exit();
            }
    }
    
}
}
?>
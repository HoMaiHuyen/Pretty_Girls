<?php 
require_once dirname(__DIR__). "/core/functions.php";
require_once dirname(__DIR__) . "/models/Order.php";
require_once dirname(__DIR__) . "/models/User.php";
class CheckoutController  {
    function index($params){
      $id = $params[0];
        $user=new User();
        $result = $user->getOneUser($id);  
        $orders= $user->getOrders($id);
        view('order/checkoutpage',compact('result','orders'));
    }
    function makeOrder(){
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $name = $_POST['name'] ?  $_POST['name'] : '';
              $phone = $_POST['phone'] ?  $_POST['phone'] : '';
              $email = $_POST['email'] ?  $_POST['email'] : '';
              $name = $_POST['name'] ?  $_POST['name'] : '';
              $address = $_POST['address'] ?  $_POST['address'] : '';

              $user_id = $_SESSION['id'];            
              $payment = $_POST['payment'] ?  $_POST['payment'] : '';
              $total_price = $_POST['total_price'] ?  $_POST['total_price'] : '';
              $current = new DateTime();
              $currentFormated = $current->format('Y-m-d');
            
              $order = new Order();
              $order->createtOrder( $user_id, $currentFormated,  $total_price, $payment, 'da nhan',  );
                 if ($order !== false) {
              header("Location:/User/show/");
              exit();
            }
          }            
}

    function createOrderDetail($order_id){


    }
}
?>
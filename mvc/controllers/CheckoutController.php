<?php
require_once dirname(__DIR__) . "/core/functions.php";
require_once dirname(__DIR__) . "/models/Order.php";
require_once dirname(__DIR__) . "/models/User.php";
class CheckoutController
{
  function index($params)
  {
    $id = $params[0];
    $user = new User();
    $orderModer = new Order();
    $result = $user->getOneUser($id);   
    $orders = $orderModer->getOrdersByUserId($id);   
    view('user-profile/index', compact('result'));
  }

  function makeOrder()
  {
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
      $order->createtOrder($user_id, $currentFormated,  $total_price, $payment, 'da nhan',);
      if ($order !== false) {
        header('Location:' . $_ENV['ROOT_URL'] . '/User/show?id=' . $user_id);
        exit();
      }
    }
  }

  public function viewOrder(){

  }
  public function orderItem($order_id)
{
   
            $orderModel = new Order();
            $orderDetails = $orderModel->findOrder($order_id);

            $productModel = new Product();
            $orderItemModel = new OrderItem();
            $orderItems = $orderItemModel->inforOrderItem($order_id);

            if (empty($orderDetails) || empty($orderItems)) {
                header('Location:' . $_ENV['ROOT_URL'] . '/shoppinCart/index');
                exit(); 
            }
            view('user-profile/profile', compact('orderDetails', 'orderItems'));
        } 
       }





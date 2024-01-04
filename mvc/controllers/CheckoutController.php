<?php
require_once dirname(__DIR__) . "/core/functions.php";
require_once dirname(__DIR__) . "/models/Order.php";
require_once dirname(__DIR__) . "/models/User.php";
require_once dirname(__DIR__) . "/models/OrderItem.php";


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
  public function viewOrder($user_id)
  {

    $user_id = $_SESSION['user_id'];

    $user = new User();
    $result = $user->getOneUser($user_id);
    $orders = $user->getOrders($user_id);

    if ($orders) {
      view('user-profile/order-page',compact('orders'));
    }
  }

  public function orderItem($order_id)
  {
    $order_id = isset($_GET['id']) ? $_GET['id'] : '';
    $orderModel = new Order();
    $orderModel->findOrder($order_id);

    $orderItemModel = new OrderItem();
    $orderItems = $orderItemModel->inforOrderItem($order_id);
  print_r($orderItems);
    if (empty($orderDetails) || empty($orderItems)) {
      header('Location:' . $_ENV['ROOT_URL'] . '/checkout/viewOrder');
      exit();
    }
    view('user-profile/profile', compact('orderDetails', 'orderItems'));
  }
}

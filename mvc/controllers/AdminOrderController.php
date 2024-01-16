<?php
require_once dirname(__DIR__) . "/models/OrderItem.php";
require_once dirname(__DIR__) . "/models/Order.php";
require_once dirname(__DIR__) . "/models/OrderStatus.php";
require_once dirname(__DIR__) . "/core/Services/Mail/ChangStatusMail.php";


class AdminOrderController
{
   
    public function viewOrder()
    {
        $orderStatusModel= new OrderStatus();
        $orderModel = new Order();
        $orders = $orderModel->getAllOrder();
        $orderss= $orderModel->getOrdersWithCountByUserId();
        
        view('admin/order/index', compact('orders','orderss'));
    }

    public function calcRevenue()
    {
        $orderModel = new OrderItem();
        $revenue = $orderModel->totalRevenue();
        view("admin/order/revenue", compact('revenue'));
    }
    
    public function viewToUpdate(){
        $id = $_GET['order_id'];
        if(isset($id)){
    
             $orderModel= new Order();
             $orderid = $orderModel->getOrderInfo($id);
          
             view('admin/order/update-status',compact('orderid')); 
                     
        }
                     
        
    }

 public function index()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['username'], $_POST['orderID'], $_POST['order_status'])) {
            $message = '';
            $email= $_POST['email'];
            $name= $_POST['username'];
            $orderId = $_POST['orderID'];
            $orderStatus = $_POST['order_status'];
            $orderModel = new Order();
            $order = $orderModel->updateStatusOrder($orderId, $orderStatus);

            if ($order !== false) {
            $order_status = new OrderStatus();
            $status_name = $order_status->getStatus($orderStatus);
           
            $sendmail = new ChangStatusMail ($name,  $status_name);
            $sendEmail = [
                'email' => $email,
                'name' => $name,
            ];

            $sendmail->setBodyEmail();
            $sendmail->sendMail($sendEmail);
            header('Location: ' . $_ENV['ROOT_URL'] . '/AdminOrder/viewOrder?message=' . $status_name);
            } else {
                echo "Failed to update order status.";
            }
        } else {
            echo "Incomplete form data.";
        }
    }
}
   
}


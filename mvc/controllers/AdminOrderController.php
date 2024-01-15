<?php
require_once dirname(__DIR__) . "/models/OrderItem.php";
require_once dirname(__DIR__) . "/models/Order.php";
require_once dirname(__DIR__) . "/models/OrderStatus.php";


class AdminOrderController
{
    public function viewOrder()
    {
        $orderStatusModel= new OrderStatus();
        $orderStatus = $orderStatusModel->getStatus();
        $orderModel = new Order();
        $orders = $orderModel->getAllOrder();
        $orderss= $orderModel->getOrdersWithCountByUserId();
        
        view('admin/order/index', compact('orders','orderss', 'orderStatus'));
    }

    public function calcRevenue()
    {
        $orderModel = new OrderItem();
        $revenue = $orderModel->totalRevenue();
        view("admin/order/revenue", compact('revenue'));
    }
    public function changStatus(){
        $
        $orderModel = new Order();
        $orderchang =  $orderModel->findOrder($order_id)  ;                                                                                                        

    }
    
}

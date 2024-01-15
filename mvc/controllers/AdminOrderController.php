<?php
require_once dirname(__DIR__) . "/models/OrderItem.php";
require_once dirname(__DIR__) . "/models/Order.php";


class AdminOrderController
{
    public function viewOrder()
    {
        $orderModel = new Order();
        $orders = $orderModel->getAllOrder();
        view('admin/order/index', compact('orders'));
    }

    public function calcRevenue()
    {
        $orderModel = new OrderItem();
        $revenue = $orderModel->totalRevenue();
        view("admin/order/revenue", compact('revenue'));
    }
}

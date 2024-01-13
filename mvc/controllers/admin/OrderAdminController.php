<?php
require_once dirname(dirname(__DIR__)) . "/models/OrderItem.php";

class OrderAdmin{
    public function viewOrder()
    {
        $orderModel = new Order();
        $orders = $orderModel->getAllOrderUser();
        view('admin/order/index', compact('orders'));
    }

    public function calcRevenue()
    {
        $orderModel = new OrderItem();
        $revenue = $orderModel->totalRevenue();
        view("admin/order/revenue", compact('revenue'));
    }
}

?>
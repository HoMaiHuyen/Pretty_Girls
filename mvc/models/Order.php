<?php
require_once "Model.php";

class Order extends Model
{

    protected $table = 'orders';
    var $user_id;
    var $total_price;
    var $date;
    var $payment_method;
    var $order_status_id;

    public function getOrdersByUserId($userId)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $query = "SELECT * FROM $this->table WHERE user_id = :user_id";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
        $stmt = $this->closeConnection();
    }
    public function getOrderInfo($orderId, $user_id)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $query = "SELECT orders.id as orderId, orders.user_id as userId ,  orders.date as Dates, orders.total_price as total_price,
                    orders.payment_method as payment, order_status.status_name as status
                    FROM orders
                    INNER JOIN order_status ON orders.order_status_id = order_status.id
                    INNER JOIN users ON orders.user_id = users.id
                    WHERE orders.id =:order_id and user_id = :user_id;";
            $stmt = $this->connect->prepare($query);

            $stmt->execute([
                ':order_id' => $orderId,
                ':user_id' => $user_id
            ]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
        $this->closeConnection();
    }
    public function getAllOrder()
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT * FROM $this->table ");
            $stmt->execute();
            $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $stmt;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
        $stmt = $this->closeConnection();
    }

    public function createtOrder($user_id, $date, $total_price, $payment_method, $order_status)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("INSERT INTO $this->table (user_id ,date, total_price, payment_method, order_status) VALUES  (:user_id, :date, :total_price, :payment_method, :order_status)");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':total_price', $total_price);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':payment_method', $payment_method);
            $stmt->bindParam(':order_status', $order_status);
            $stmt->execute();
            $result = $stmt->rowCount();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
        $stmt = $this->closeConnection();
    }

    public function findOrder($order_id)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT id FROM $this->table WHERE order_id =:order_id");
            $stmt->setAttribute(PDO::FETCH_OBJ);
            $stmt->execute([
                ":order_id" => $order_id
            ]);
            $stmt->fetchColumn();
            return $stmt;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
        $stmt = $this->closeConnection();
    }


    public function delete($order_id)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("DELETE FROM $this->table WHERE order_id=:order_id");
            $stmt->execute([
                ':order_id' => $order_id
            ]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
        $stmt = $this->closeConnection();
    }
}

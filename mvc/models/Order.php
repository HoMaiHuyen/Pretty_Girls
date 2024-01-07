<?php
require_once "Model.php";

class Order extends Model
{

    protected $table = 'orders';
    public function getOrdersByUserId($userId)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $query =  "SELECT orders.id as orderId, orders.user_id as userId ,  orders.date as Dates, orders.total_price as total_price,
          orders.payment_method as payment, order_status.status_name as status, orders.created_at AS created_at
          FROM $this->table
          INNER JOIN order_status ON orders.order_status_id = order_status.id
          INNER JOIN users ON orders.user_id = users.id
          WHERE orders.user_id = :user_id";

            $stmt = $this->connect->prepare($query);

            $stmt->execute([
                ':user_id' => $userId,

            ]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
        $stmt = $this->closeConnection();
    }

    public function getOrderInfo($orderId)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $query = "SELECT orders.id as orderId, orders.user_id as userId ,  orders.date as Dates, orders.total_price as total_price,
                    orders.payment_method as payment, order_status.status_name as status, orders.created_at AS created_at
                    FROM orders
                    INNER JOIN order_status ON orders.order_status_id = order_status.id
                    INNER JOIN users ON orders.user_id = users.id
                    WHERE orders.id =:order_id";
            $stmt = $this->connect->prepare($query);

            $stmt->execute([
                ':order_id' => $orderId,

            ]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    public function createOrder($user_id, $order_status_id, $date, $total_price, $payment_method)
    {
        if (!$this->connect) {
            return false;
        }

        try {
            $stmt = $this->connect->prepare("INSERT INTO $this->table (user_id, order_status_id, date, total_price, payment_method, created_at) 
            VALUES (:user_id, :order_status_id, :date, :total_price, :payment_method, NOW())");

            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':order_status_id', $order_status_id);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':total_price', $total_price);
            $stmt->bindParam(':payment_method', $payment_method);

            $stmt->execute();
            $lastInsertId = $this->connect->lastInsertId();
            return $lastInsertId;
        } catch (PDOException $e) {
           
            error_log("Error creating order: " . $e->getMessage());
            return false;
        } finally {
            $this->closeConnection();
        }
    }


    public function findOrder($order_id)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT id FROM $this->table WHERE id =:order_id");

            $stmt->execute([
                ":order_id" => $order_id
            ]);
            $result = $stmt->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
        $stmt = $this->closeConnection();
    }


    public function delete($order_id)
{
    if (!$this->connect) {
        return false;
    }

    try {
        $stmt = $this->connect->prepare("DELETE FROM $this->table WHERE id=:order_id");
        $result = $stmt->execute([
            ':order_id' => $order_id
        ]);

        // Kiểm tra xem việc xóa có thành công hay không
        if ($result) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    } finally {
        $this->closeConnection();
    }
}

    public function updateOrder($user_id, $order_status_id, $date, $total_price, $payment_method)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("UPDATE $this->table SET user_id=:user_id, 
        order_status_id=:order_status_id, date:=date, total_price=:total_price, payment_method=:payment_method,NOW() ");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':order_status_id', $order_status_id);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':total_price', $total_price);
            $stmt->bindParam(':payment_method', $payment_method);
            $stmt->execute();
            $result = $stmt->rowCount();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        } finally {
            $this->closeConnection();
        }
    }
}

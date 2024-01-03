<?php
class OrderItem extends Model
{
    protected $table = "order_items";



    public  function getForOrder($order_id)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT * FROM $this->table WHERE order_id=:order_id");
            $stmt->bindParam(':id', $order_id);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function createOrderItem($order_id, $product_id, $quantity, $price, $image_url)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("INSERT INTO $this->table (order_id, product_id, quantity, unit_price, image_url)
            VALUES (:order_id, :product_id, :quantity, :price, :image_url)");           
            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image_url', $image_url);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (Exception $e) {
           
            return 0;
        }
    }

    public function findOrderDetail($order_id)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT order_id FROM $this->table WHERE order_id=:order_id");
            $stmt->execute([
                ':order_id' => $order_id
            ]);
            $result = $stmt->fetchColumn();

            if ($result !== false) {
                return $result;
            } else {
                return null;
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function inforOrderItem($order_id)
    {
        if (!$this->connect) {
            return [];
        }

        try {
            $sql = ("SELECT order_items.order_id AS order_id, order_items.quantity AS quantity,
                products.price  AS unit_price, products.id AS product_id,
                products.product_name AS product_name , products.image_url AS image_url, orders.total_price AS total_price
                FROM $this->table
                JOIN products ON products.id = order_items.product_id
                JOIN orders ON orders.id = order_items.order_id
                WHERE order_items.order_id =:order_id");

            $stmt = $this->connect->prepare($sql);
            $stmt->execute([':order_id' => $order_id]);

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }
}

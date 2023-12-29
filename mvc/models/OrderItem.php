<?php
class OrderItem extends Model
{
    protected $table = "odder_items";
    var $order_id;
    var $price;
    var $product_id;


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
            $stmt = $this->connect->prepare("INSERT INTO $this->table (order_id,product_id, quantity ,price, image_url )
            VALUES (:order_id, :product_id, :quantity, :price, :image_url) ON DUPLICATE KEY UPDATE quantity+=quantity ");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image_url', $image_url);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function findOrderDetail($order_item_id)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT * FROM $this->table WHERE order_detail_id=:order_detail_id");
            $stmt->execute([
                ':order_detail_id' => $order_item_id
            ]);
            $stmt->setFetchMode(PDO::FETCH_CLASS);
            return $stmt->fetch();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}

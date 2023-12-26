<?php
require_once "Model.php";

class Order extends Model
{

    protected $table = 'orders';
    public function __construct($db) {
        $this->connect = $db;
    }

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
            $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
        $stmt = $this->closeConnection();
    }
}

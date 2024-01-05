<?php
require_once "Model.php";

class Shop extends Model
{
    protected $table ='shop';

    public function getShop(){
        if (!$this->connect) {
            error_log("Database connection failed.");
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT * FROM $this->table");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // Log lỗi vào file hoặc in ra màn hình để kiểm tra
            error_log("Error in getShop: " . $e->getMessage());
            return [];
        }
    }
    
    }
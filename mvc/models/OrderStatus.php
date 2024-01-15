<?php
require_once "Model.php";

class OrderStatus extends Model
{
    
    protected $table='order_status';
    public function getStatus(){
         if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT * FROM $this->table");
    
            $stmt->execute();
            $result=  $stmt ->fetch(PDO::FETCH_ASSOC);
            if ($result !== false) {
                return $result;
            } else {
                return []; // Trả về mảng rỗng nếu không có dữ liệu
            }
           
        }catch(Exception $e){
            $e->getMessage();
        }
        $this->closeConnection();
    }
}
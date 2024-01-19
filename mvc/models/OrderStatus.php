<?php
require_once "Model.php";

class OrderStatus extends Model
{
    
    protected $table='order_status';
    public function getStatus($order_status_id){
         if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT status_name FROM $this->table WHERE id=:order_status_id");
    
            $stmt->execute([
                'order_status_id' => $order_status_id
            ]);
            $result=  $stmt ->fetch(PDO::FETCH_ASSOC);
           if ($result !== false) {
            return $result['status_name'];
        } else {
            return false; 
        }
           
        }catch(Exception $e){
            $e->getMessage();
        }
        $this->closeConnection();
    }
}
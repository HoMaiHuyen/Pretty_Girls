<?
require_once "Model.php";

class OrderStatus extends Model
{
    
    protected $table='order_status';
    public function getStatus($order_status_id){
         if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT * FROM $this->table WHERE id=:order_id");
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute([
                ':id'=>$order_status_id
            ]);
            $stmt ->fetch();
            return $stmt;
        }catch(Exception $e){
            $e->getMessage();
        }
    }
}
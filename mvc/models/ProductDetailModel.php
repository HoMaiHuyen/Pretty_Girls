<?php
require_once "Model.php";
class ProductDetailModel extends Model
{
    protected $table = "products";
    public function getOneProduct($id)
    {
        if (!$this->connect) {
            return [];
        }

        try {
            $stmt = $this->connect->prepare("SELECT * FROM $this->table WHERE id=:id");
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute(
                [
                    ":id" => $id
                ]
            );
            return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the data
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}

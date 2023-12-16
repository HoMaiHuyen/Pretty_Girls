<?php
// Make sure to require the necessary dependencies, such as PDO and the Model class
require_once "Model.php";

class User extends Model
{
    protected $table = "products";

    function getAll()
    {
        if (!$this->connect) {
            return [];
        }

        try {
            $stmt = $this->connect->prepare("SELECT * FROM $this->table");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}

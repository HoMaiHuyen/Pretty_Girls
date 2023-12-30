<?php
require_once "Model.php";

class Product extends Model
{
    protected $table = "products";
    function getAllProduct()
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT * FROM $this->table");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function getOne($id)
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
    function search($keyword)
    {
        if (!$this->connect) {
            return [];
        }


        try {
            $sttm = $this->connect->prepare("SELECT * FROM $this->table WHERE product_name LIKE :keyword");
            $sttm->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
            $sttm->execute();
            $searchResult = $sttm->fetchAll(PDO::FETCH_ASSOC);
            return $searchResult;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    function popular(){
        if(!$this->connect){
            return [];
        }
        try {
            $sttm=$this->connect->prepare("SELECT * FROM $this->table ORDER BY quantity ASC limit 8");
            $sttm->execute();
            $popularResult=$sttm->fetchAll(PDO::FETCH_ASSOC);
            return $popularResult;
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

}

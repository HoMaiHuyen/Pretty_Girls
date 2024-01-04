<?php
require_once "Model.php";

class Product extends Model
{
    protected $table = 'products';
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

    function findProductById($product_id)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare('SELECT id  FROM $this->table WHERE id=:product_id');
            $stmt->execute([
                ':product_id' => $product_id
            ]);
            return  $stmt->fetchColumn();
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

    function popular()
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $sttm = $this->connect->prepare("SELECT * FROM $this->table ORDER BY quantity ASC limit 8");
            $sttm->execute();
            $popularResult = $sttm->fetchAll(PDO::FETCH_ASSOC);
            return $popularResult;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    
    function updateProductQ($product_id, $quantity)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("UPDATE $this->table SET quantity=:quantity WHERE id=:product_id ");
            $stmt->bindParam(':product_id',$product_id );
            $stmt->bindParam(':quantity', $quantity);
            $stmt->execute();
            $result=  $stmt->rowCount();

            return $result;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    /// admin
    function deleteProduct($id)
    {
        if (!$this->connect) {
            return [];
        }

        try {
            $stmt = $this->connect->prepare("DELETE FROM $this->table WHERE id = :id");
            $stmt->execute(
                [
                    ":id" => $id
                ]
            );
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    function updateProduct($id, $name, $description, $categories, $image_name, $fileimage, $qty, $price)
{
    if (!$this->connect) {
        return false; // Return false instead of an empty array when there's no connection
    }

    try {
        if ($fileimage !== "") {
            $stmt = $this->connect->prepare("UPDATE $this->table SET product_name = :product_name, description = :description, categories = :categories, image_name = :image_name, image_url = :fileimage, quantity = :quantity, price = :price WHERE id = :id");
            $stmt->bindParam(':fileimage', $fileimage); 
        } else {
            $stmt = $this->connect->prepare("UPDATE $this->table SET product_name = :product_name, description = :description, categories = :categories, image_name = :image_name, quantity = :quantity, price = :price WHERE id = :id");
        }

        // Common bindings for both cases
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':product_name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':categories', $categories);
        $stmt->bindParam(':image_name', $image_name);
        $stmt->bindParam(':quantity', $qty);
        $stmt->bindParam(':price', $price);

        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function insertProduct($name, $description, $categories, $image_name, $image_url, $qty, $price)
{
    if (!$this->connect) {
        return [];
    }
    try {
        $stmt = $this->connect->prepare("INSERT INTO $this->table (product_name,description,categories,image_name,image_url, quantity, price) VALUES (:product_name, :description, :categories, :image_name, :image_url, :quantity, :price)");
        $stmt->bindParam(':product_name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':categories', $categories);
        $stmt->bindParam(':image_name', $image_name);
        $stmt->bindParam(':image_url', $image_url);
        $stmt->bindParam(':quantity', $qty);
        $stmt->bindParam(':price', $price);
        $stmt->execute();  // Corrected from exec() to execute()
        return true;  // Indicate success
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

}

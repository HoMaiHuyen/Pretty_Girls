<?php
require_once "Order.php";
require_once "Model.php";
class User extends Model
{
    protected $table = "users";

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

    public function createUser($user_name, $phone, $password, $email, $address)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("INSERT INTO users (user_name, phone, password, email, role, address, image_url) 
            VALUES (:user_name, :phone, :password, :email, null, :address, null)");

            $stmt->bindParam(':user_name', $user_name);
            $stmt->bindParam(':phone', $phone);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function deleteUser($id)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            return $rowCount;
        } catch (PDOException $e) {
            error_log("Error deleting user: " . $e->getMessage());
            return false;
        }
    }

    public function updateUser($id, $user_name, $phone, $email, $address)
    {
        if (!$this->connect) {
            return false; // Consistent return type
        }
        try {
            $stmt = $this->connect->prepare("UPDATE $this->table SET user_name=:user_name, phone=:phone, email=:email, address=:address WHERE id=:id");

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':user_name', $user_name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->execute();
            $result = $stmt->rowCount();
            return $result;
        } catch (PDOException $e) {
            error_log("Error updating user: " . $e->getMessage());
            return false;
        }
    }

    function UpdateImage($id, $image_url)
    {
        if (!$this->connect) {
            return false; 
        }

        try {
            $stmt = $this->connect->prepare("UPDATE $this->table SET image_url = :image_url WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':image_url', $image_url);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getOneUser($id)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT * FROM $this->table WHERE id=:id");
            // $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute(
                [
                    ":id" => $id
                ]
            );
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
        $stmt = $this->closeConnection();
    }

    public function getOrders($id)
    {
        $order = new Order($this->connect);
        $result = $order->getOrdersByUserId($id);
        return $result;
    }

    public function getOne($email)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}

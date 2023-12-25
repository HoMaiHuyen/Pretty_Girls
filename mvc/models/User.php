<?php

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

    public function createUser($user_name, $phone, $passwords, $email, $address)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("INSERT INTO users (user_name, phone, passwords, email, role, address, image_url) VALUES (:user_name, :phone, :passwords, :email, null, :address, null)");

            $stmt->bindParam(':user_name', $user_name);
            $stmt->bindParam(':phone', $phone);
            $hashed_password = password_hash($passwords, PASSWORD_DEFAULT);
            $stmt->bindParam(':passwords', $hashed_password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function updateUser($id, $user_name, $phone, $email, $address, $password)
    {
        if (!$this->connect) {
            return false; // Consistent return type
        }
        try {
            $stmt = $this->connect->prepare("UPDATE $this->table SET user_name=:user_name, phone=:phone, password=:password, email=:email, address=:address WHERE id=:id");

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':user_name', $user_name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $result = $stmt->rowCount();
            return $result;
        } catch (PDOException $e) {
            error_log("Error updating user: " . $e->getMessage());
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
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute(
                [
                    ":id" => $id
                ]
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
        $stmt = $this->closeConnection();
    }
}

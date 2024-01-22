<?php
require_once "Model.php";

class Comment extends Model
{
    protected $table = 'comment';

    function getAllComments()
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


    public function createComment($user_id, $product_id, $comment, $comment_time)
    {
        if (!$this->connect) {
            echo "Failed to connect to the database.";
            return false;
        }
        try {
            $stmt = $this->connect->prepare("INSERT INTO $this->table (user_id, product_id, message, comment_time) 
            VALUES (:user_id, :product_id, :message, :comment_time)");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->bindParam(':message', $comment);
            $stmt->bindParam(':comment_time', $comment_time);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getComments($product_id)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("SELECT * FROM $this->table WHERE product_id = :product_id");
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function getCommentById($id)
    {
        if (!$this->connect) {
            return [];
        }

        try {
            $stmt = $this->connect->prepare("SELECT * FROM $this->table WHERE id = :id");
            $stmt->bindParam('id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // Admin delete
    public function deleteCommentById($id){
    
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("DELETE FROM comment WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            return $rowCount;
        } catch (PDOException $e) {
            error_log("Error deleting comment: " . $e->getMessage());
            return false;
        }
    }

    //User delete
    public function deleteComment($id,$user_id,$product_id)
    {
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("DELETE FROM comment WHERE id = :commentId AND user_id = :userId AND product_id = :productId");
            $stmt->bindParam(':commentId', $id);
            $stmt->bindParam(':userId', $user_id);
            $stmt->bindParam(':productId', $product_id);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            return $rowCount;
        } catch (PDOException $e) {
            error_log("Error deleting comment: " . $e->getMessage());
            return false;
        }
    }

    public function updateComment($id, $user_id, $product_id, $message){
        if (!$this->connect) {
            return [];
        }
        try {
            $stmt = $this->connect->prepare("UPDATE $this->table SET message = :message WHERE id = :id AND user_id = :user_id AND product_id = :product_id");

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->bindParam(':message', $message);
            $stmt->execute();
            // $result = $stmt->rowCount();
            return true;
        } catch (PDOException $e) {
            error_log("Error updating comment: " . $e->getMessage());
            return false;
        }

    }
}

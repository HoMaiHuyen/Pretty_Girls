<?php 
require_once "Model.php";
    class User extends Model{
        protected $table = "posts";
        function getAll(){
           return $this->connect->query("SELECT * FROM $this->table")->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
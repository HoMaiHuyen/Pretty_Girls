<?php 
// require_once dirname(__DIR__)."/core/Connect.php";
    class Model{
        protected $table;
        protected $connect;

        function __construct()
        {
            $host     = 'localhost'; // Because MySQL is running on the same computer as the web server
            $database = 'PHP_connect'; // Name of the database you use (you need first to CREATE DATABASE in MySQL)
            $user     = 'root'; // Default username to connect to MySQL is root
            $password = ''; // Default password to connect to MySQL is empty
        
            try {
                $this->connect = new PDO("mysql:host=$host;dbname=$database", $user, $password);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
              $e->getMessage();
              $this->connect = null;
            }
        }
    }
    
?>
<?php
require_once dirname(__DIR__) . "/core/DotEnvironment.php";
class Model
{
    protected $table;
    protected $connect;

    function __construct()
    {
        $evn = new DotEnvironment();
        $evn->load();
        $host     = getenv('DB_HOST'); // Because MySQL is running on the same computer as the web server
        $database = getenv('DB_NAME'); // Name of the database you use (you need first to CREATE DATABASE in MySQL)
        $user     = getenv('DB_USER'); // Default username to connect to MySQL is root
        $password = getenv('DB_PASSWORD'); // Default password to connect to MySQL is empty

        try {
            $this->connect = new PDO("mysql:host=$host;dbname=$database", $user, $password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $e->getMessage();
            $this->connect = null;
        }
    }
}

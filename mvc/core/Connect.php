<?php
class Connect
{
    protected $host;
    protected $databaseName;
    protected $user;
    protected $password;
    protected $port;
    protected $connect;

    public function setup(){
        $this->host="localhost";
        $this->databaseName="PHP_connect";
        $this->user="root";
        $this->password="";
        $this->port="3306";
        
    }
    public function __construct()

    {
        $this->setup();
        try {
            $this->connect = new PDO("mysql:host=$this->host;dbname=$this->databaseName", $this->user, $this->password);
            // set the PDO error mode to exception
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            //  echo "Connection failed: " . $e->getMessage();
            $e->getMessage();
            $this->connect = null;
        }
        return $this->connect;
    }
}

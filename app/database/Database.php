<?php
class Database {
    //parameters of database that we want to connect to
    private $host      = "localhost";
    private $db_name   = "assess";
    private $username  = "root";
    private $password  = "";
    private $conn;
    
    //method for database connections
    public function join() {
        $this->conn = null;

        try {
        $this->conn = new PDO('mysql:host=' . $this->host .';dbname=' . $this->db_name, 
        $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
        echo 'Connection Error '. $e->getMessage();
        }
        return $this->conn;
    }
}





















?>
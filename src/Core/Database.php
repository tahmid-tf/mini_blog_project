<?php

namespace Core;
use PDO;
use PDOException;

class Database{
    private static $instance = null;
    private $pdo;

    private function __construct(){
        try {

            // setting the database connection
            $this->pdo = new PDO("mysql:host=localhost;dbname=blog", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
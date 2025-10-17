<?php

namespace App\Core;
use PDO;
use PDOException;

class Database {

    protected $pdo;
    public function __construct()
    {
        $dsn = "mysql:dbname=colegio_primeira_opcao;host=localhost";
        $user = "root";
        $pass = "";

        try {
            $this->pdo = new PDO($dsn, $user, $pass);
            
        } catch(PDOException $e) {
            echo ('Erro ao tentar se conectar com o DB: ' . $e->getMessage());
            die();
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
    
}
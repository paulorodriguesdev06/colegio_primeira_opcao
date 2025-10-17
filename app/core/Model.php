<?php
namespace App\Core;
use App\Core\Database;
use PDO;
abstract class Model {

    protected $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }
}
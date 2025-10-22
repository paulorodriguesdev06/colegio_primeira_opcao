<?php
namespace App\Models;
use App\Core\Model;
class UsuarioDao extends Model{
    
    private function __construct() {
        parent::__construct();
    }   

    private function contarLinhas($stmt) {
        $resultado = $stmt->rowCount();
        if($resultado == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function quantidadeDeFuncionários() {
        $sql = "SELECT * FROM funcionarios";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
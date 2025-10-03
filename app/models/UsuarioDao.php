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

    private function seEmailExiste($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $qtdLinhas = $this->contarLinhas($stmt);
    
        $resultado = $stmt->fetch();
        return $resultado;
        
    }

}
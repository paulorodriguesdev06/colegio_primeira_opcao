<?php
namespace App\Models;
use App\Core\Model;
use App\Models\Session;

class LoginQueries extends Model {

    public function seUsuarioExiste($usuario) {
        $sql = "SELECT * FROM funcionarios WHERE usuario = :usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':usuario', $usuario);
        $stmt->execute();
        if($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetch();
        }
    }

    public function selecionarTodos() {
        $sql = "SELECT * FROM funcionarios";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selecionarUsuario($usuario) {
        $sql = "SELECT * FROM funcionarios WHERE usuario = :usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':usuario', $usuario);
        $stmt->execute();

        return $stmt->fetch();
    }
}
<?php
namespace App\Models;
use App\Core\Model;
use App\Models\Funcionario;

class FuncionarioDao extends Model{
    
    

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

    public function selecionarUsuarioPorID() {
        $sql = "SELECT * FROM funcionarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $_SESSION['usuario_id']);
        $stmt->execute();
        $resultado = $stmt->fetch();

        $funcionario = new Funcionario();
        $funcionario->setId($resultado['id']);
        $funcionario->setNome($resultado['nome']);
        $funcionario->setUsuario($resultado['usuario']);
        $funcionario->setEmail($resultado['email']);
        $funcionario->setSenha($resultado['senha']);
        $funcionario->setDataNascimento($resultado['data_nascimento']);
        $funcionario->setCargo($resultado['cargo']);
        $funcionario->setSerie($resultado['serie']);
        $funcionario->setAdmin($resultado['admin']);

        return $funcionario;
    }

}
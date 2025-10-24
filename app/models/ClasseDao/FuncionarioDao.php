<?php
namespace App\Models\ClasseDao;
use App\Core\Model;
use App\Models\Funcionario;

class FuncionarioDao extends Model {
    private function contarLinhas($stmt) {
        $resultado = $stmt->rowCount();
        if($resultado == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function quantidadeDeFuncionarios() {
        $sql = "SELECT * FROM funcionarios";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function selecionarTodosFuncionarios() {
        $sql = 'SELECT * FROM `funcionarios`';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $listadeRegistros = $stmt->fetchAll();
        $listadeFuncionarios = [];

        foreach($listadeRegistros as $registro) {
            $f = new Funcionario();
            $f->setId($registro['id']);
            $f->setNome($registro['nome']);
            $f->setUsuario($registro['usuario']);
            $f->setEmail($registro['email']);
            $f->setSenha($registro['senha']);
            $f->setDataNascimento($registro['data_nascimento']);
            $f->setCargo($registro['cargo']);
            $f->setSerie($registro['serie']);
            $f->setAdmin($registro['admin']);

            $listadeFuncionarios[] = $f;

        }
        return $listadeFuncionarios;
    }

    public function selecionarUsuarioPorID($id) {
        $sql = "SELECT * FROM funcionarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $registro = $stmt->fetch();

        $f = new Funcionario();
        $f->setNome($registro['nome']);
        $f->setUsuario($registro['usuario']);
        $f->setEmail($registro['email']);
        $f->setSenha($registro['senha']);
        $f->setDataNascimento($registro['data_nascimento']);
        $f->setCargo($registro['cargo']);
        $f->setSerie($registro['serie']);
        $f->setAdmin($registro['admin']);

        return $f;
    }

}
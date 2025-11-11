<?php
namespace App\Models\ClasseDao;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use App\Core\Model;
use App\Models\Funcionario;

class FuncionarioDao extends Model
{

    public function quantidadeDeFuncionarios()
    {
        $sql = "SELECT * FROM funcionarios";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function selecionarTodosFuncionarios()
    {
        $sql = 'SELECT * FROM `funcionarios`';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $listadeRegistros = $stmt->fetchAll();
        $listadeFuncionarios = [];

        foreach ($listadeRegistros as $registro) {
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

    public function selecionarUsuarioPorID($id)
    {
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

    public function selecionarFuncionarioporUsuario($usuario)
    {
        $sql = "SELECT * FROM funcionarios WHERE usuario = :usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        $registro = $stmt->fetch();

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

        return $f;

        
    }

    public function redefinirSenha($usuario) {
        $usuario = $this->selecionarFuncionarioporUsuario($usuario);
        if($usuario) {
            $destino = $usuario->getEmail();
            $assunto = "Redefinição de Senha - Colégio Primeira Opção";
            $mensagem = "Olá";
            $headers = "From : pvsrimp@gmail.com0";
            mail($destino, $assunto, $mensagem, $headers);
            echo "Email enviadp";
        } else {
            echo 'Erro ao enviar';
        }

    }



}


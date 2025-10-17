<?php
namespace App\Models;
use App\Core\Model;

class LoginQueries extends Model {

    public function loginCadastro() {
        if (!empty($_POST['usuario']) && !empty($_POST['senha']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            $dadosdoUsuario = $this->seUsuarioExiste($usuario);

            if ($dadosdoUsuario != false) {
                if ($senha == $dadosdoUsuario['senha']) {
                    $admin = $dadosdoUsuario['admin'];
                    session_start();
                    $_SESSION['logado'] = true;
                    $_SESSION['id'] = $dadosdoUsuario['id'];
                    $_SESSION['nome'] = $dadosdoUsuario['nome'];
                    $_SESSION['usuario'] = $dadosdoUsuario['usuario'];
                    $_SESSION['telefone'] = $dadosdoUsuario['telefone'];
                    if($admin == 1) {
                        $_SESSION['admin'] = true;
                        header('Location: adminHome');
                        exit();
                        return true;
                    } else {
                        $_SESSION['admin'] = false;
                        header('Location: home');
                        exit();
                        return true;
                    }
                    
                } else {
                    $erro = 'Senha ou usuário incorretos';
                    return $erro;
                }
                
            } else {
                $erro = 'Ocorreu um erro ao tentar logar. Tente novamente.';
                return $erro;
            }
        }
    }
    

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
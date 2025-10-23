<?php
namespace App\Models;
use App\Core\Model;
class Funcionario extends Model {

    // Atributos

    private $id;
    private $nome;
    private $usuario;
    private $email;
    private $senha;
    private $data_nascimento;
    private $cargo;
    private $serie;
    private $admin;

    // Métodos

    // Métodos Get

    public function getId() { return $this->id; }
    public function getNome() { return $this->nome; }
    public function getUsuario() { return $this->usuario; }
    public function getEmail() { return $this->email; }
    public function getSenha() { return $this->senha; }
    public function getDataNascimento() { return $this->data_nascimento; }
    public function getCargo() { return $this->cargo; }
    public function getSerie() { return $this->serie; }
    public function getAdmin() { return $this->admin; }

    // Métodos Set

    public function setId($id) { $this->id = $id; }
    public function setNome($nome) { $this->nome = $nome; }
    public function setUsuario($usuario) { $this->usuario = $usuario; }
    public function setEmail($email) { $this->email = $email; }
    public function setSenha($senha) { $this->senha = $senha; }
    public function setDataNascimento($data_nascimento) { $this->data_nascimento = $data_nascimento; }
    public function setCargo($cargo) { $this->cargo = $cargo; }
    public function setSerie($serie) { $this->serie = $serie; }
    public function setAdmin($admin) { $this->admin = $admin; }

    

}
<?php
namespace App\Models;
use App\Core\Model;


class Aluno extends Model
{

    // Atributos

    private $id;
    private $nome;
    private $turma;
    private $status;

    // Métodos setter

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTurma($turma) {
        $this->turma = $turma;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    // Métodos getter

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTurma() {
        return $this->turma;
    }

    public function getStatus() {
        return $this->status;
    }
}
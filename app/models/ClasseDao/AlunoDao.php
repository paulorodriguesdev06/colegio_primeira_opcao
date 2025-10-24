<?php
namespace App\Models\ClasseDao;
use App\Core\Model;
use App\Models\Aluno;
use Pdo;

class AlunoDao extends Model
{

    public function selecionarTodosAlunos() {
        $sql = 'SELECT * FROM alunos';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $listadeRegistros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $listadeALunos = [];

        foreach($listadeRegistros as $registro) {
            $a = new Aluno();
            $a->setID($registro['id']);
            $a->setNome($registro['nome']);
            $a->setTurma($registro['turma']);
            $a->setStatus($registro['status']);
            $listadeAlunos[] = $a;
        }
        return $listadeAlunos;
    }

    public function selecionarTodosReprovados() {
        $sql = 'SELECT * FROM alunos WHERE status = "Reprovado"';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        
        $listadeRegistros = $stmt->fetchAll();
        $listadeAlunosReprovados = [];

        foreach($listadeRegistros as $registro) {
            $a = new Aluno();
            $a->setID($registro['id']);
            $a->setNome($registro['nome']);
            $a->setTurma($registro['turma']);
            $a->setStatus($registro['status']);
            $listadeAlunosReprovados[] = $a;
        }

        return $listadeAlunosReprovados;
    }

}
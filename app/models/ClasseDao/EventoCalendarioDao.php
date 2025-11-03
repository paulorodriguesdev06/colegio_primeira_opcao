<?php
namespace App\models\ClasseDao;
use App\Core\Model;
use App\Models\EventoCalendario;

class EventoCalendarioDao extends Model
{
    public function selecionarTodosEventos()
    {
        $listadeEventos = [];
        $sql = "SELECT * FROM eventoscalendario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $listadeRegistros = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach($listadeRegistros as $registro) {

            $evento = new EventoCalendario();
            $evento->setId($registro['id']);
            $evento->setTitle($registro['title']);
            $evento->setColor($registro['color']);
            $evento->setStart($registro['start']);
            $evento->setEnd($registro['end']);

            $listadeEventos[] = $evento;

        }
        return $listadeEventos;
    }
}
<?php
namespace App\Models;
use App\Core\Model;

class EventoCalendario extends Model 
{

    // Atributos

    private $id;
    private $title;
    private $color;
    private $start;
    private $end;


    // Métodos setter
    public function setId($id) { $this->id = $id; }
    public function setTitle($title) { $this->title = $title; }
    public function setColor($color) { $this->color = $color; }
    public function setStart($start) { $this->start = $start; }
    public function setEnd($end) { $this->end = $end; }


    // Métodos getter

    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getColor() { return $this->color; }
    public function getStart() { return $this->start; }
    public function getEnd() { return $this->end; }

}
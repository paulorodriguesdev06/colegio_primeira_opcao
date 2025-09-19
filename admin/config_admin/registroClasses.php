<?php require_once '../../connection_db/conexao.php';

class Registro {

    public static function deuCerto($evento) {
        if($evento->rowcount() > 0) {
            return true;     
        } else {
            return false;
        };
    }
}
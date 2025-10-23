<?php

namespace App\Models;

use App\Core\Model;

class Session extends Model
{

    public static function startSession()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        
    }

    public static function destroySession()
    {
        session_destroy();
        header('Location: login');
    }

    public static function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }
}

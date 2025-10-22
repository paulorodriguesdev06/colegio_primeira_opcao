<?php
namespace App\Controllers;

use App\Models\Session;
use App\Core\Controller;

class SessionController extends Controller {

    public function logout() {
        Session::destroySession();
        header('Location: ' . BASE_URL . '/login');
        exit;
    }
}
<?php
require __DIR__ . '/../vendor/autoload.php';
use App\Models\Session;
use App\core\Router;
Session::startSession();
$url = isset($_GET['url']) ? $_GET['url'] : '/';

$router = new Router();
$router->dispatch($url);
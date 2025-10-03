<?php
namespace App\core;
use App\Controllers\ErrorController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\AdminHomeController;


class Router {

    public function dispatch($url) {
        $url = trim($url, '/');
        $parts = $url ? explode('/', $url) : [];
        // dd($parts);
        $controllerName = $parts[0] ?? 'Login';
        $controllerName = 'App\Controllers\\' . ucfirst($controllerName) . 'Controller';
        if(!class_exists($controllerName)) {
            $controller = new ErrorController();
            $controller->notfound();
            return;
        };

        $controller = new $controllerName();
        $actionName = $parts[1] ?? 'index';
        if(!method_exists($controller, $actionName)) {
            $controller = new ErrorController();
            $controller->notfound();
            return;
        };

        $params = array_slice($parts, 2);
        call_user_func_array([$controller, $actionName], $params);
        
    }
}
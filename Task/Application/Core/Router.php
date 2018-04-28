<?php

namespace Application\Core;

class Router
{
    protected $routes = [];
    protected $params;

    public function __construct()
    {
        $arr = require CONFIG.DS.'routes.php';

        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }

    }

    public function add($route, $params) {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    public function match() {
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $uri, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run() {
        if ($this->match()) {

            $controller_file = ucfirst($this->params['controller']).'Controller';
            $controller_path = str_replace('/','\\',"Application/Controllers/".$controller_file);

            if (class_exists($controller_path)) {
                $action = $this->params['action'].'Action';

                if (method_exists($controller_path, $action)) {
                    $controller = new $controller_path;
                    $controller->$action();
                } else {
                    echo 'Не найден экшн';
                }

            } else {
                echo 'Не найден контроллер '.$controller_path;
            }

        } else {
            echo 'Не найден маршрут';
        }
    }
}
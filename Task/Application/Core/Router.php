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

            $path = CONTROLLERS.DS.ucfirst($this->params['controller']).'Controller';
            $path = ROOT.DS.'Application'.DS.'Controllers'.DS.ucfirst($this->params['controller']).'Controller';

            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)) {
                    $controller->$action();
                } else {
                    echo 'Не найден экшн';
                }
            } else {
                echo 'Не найден контроллер '.$path;
            }

        } else {
            echo 'Не найден маршрут';
        }
    }
}
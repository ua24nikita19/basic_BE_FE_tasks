<?php

namespace Application\Core;

use Application\Core\View;

/** Class for shaping route */

class Router
{
    protected static $routes = [];
    protected $params;

    public function __construct()
    {
        $arr = require CONFIG.DS.'routes.php';

        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    /** Get the route*/
    public static function getRoute(){
        return Router::$routes;
    }

    /** Get existing routes*/
    public function add($route, $params) {
        $route = '#^'.$route.'$#';
        Router::$routes[$route] = $params;
    }

    /** For check current uri with existing routes*/
    public function match() {
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        foreach (Router::$routes as $route => $params) {
            if (stristr($route, $uri, true)) {
                $this->params = $params;

                return true;
            }
        }
        return false;
    }

    /** Check routes on exist and call the action of controller
     from route*/
    public function run() {

        if ($this->match()) {

            $controller_file = ucfirst($this->params['controller']).'Controller';
            $controller_path = str_replace('/','\\',"Application/Controllers/".$controller_file);

            if (class_exists($controller_path)) {
                $action = $this->params['action'].'Action';
                if (method_exists($controller_path, $action)) {

                    $controller = new $controller_path($this->params);
                    $controller->$action();
                } else {
                    View::error(404);
//                    echo 'Нету метода';
                }

            } else {
                View::error(404);
//                echo 'Нету class';
            }

        } else {
            View::error(404);
//            echo 'Нету rout';
        }
    }
}
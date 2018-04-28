<?php

class Router
{
    protected $uri;
    protected $action;
    protected $params;
    protected $controller;
    protected $route;


    public function __construct($uri)
    {
        $this->uri = urldecode(trim($uri, '/'));


        $routes = Config::getSettings('routes');
        $this->route = Config::getSettings('default_route');

        $uri_parts = explode('?', $this->uri);

        $path = $uri_parts[0];

        $path_part = explode('/', $path);

        if (count($path_part)) {

            if ( in_array(strtolower(current($path_part)), array_keys($routes)) ) {
                $this->route = strtolower(current($path_part));
                array_shift($path_part);
            }

            if ( current($path_part) ) {
                $this->controller = strtolower(current($path_part));
                array_shift($path_part);
            }

            if ( current($path_part) ) {
                $this->action = strtolower(current($path_part));
                array_shift($path_part);
            }

            $this->params = $path_part;
        }
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getUri()
    {
        return $this->uri;
    }


    public function getRoute()
    {
        return $this->route;
    }
}
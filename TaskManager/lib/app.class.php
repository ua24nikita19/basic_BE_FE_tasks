<?php

class App
{
    protected static $router;


    public static function getRouter()
    {
        return self::$router;
    }

    public static function run($uri) {
        self::$router = new Router($uri);

        $controller_class = ucfirst(self::$router->getController()).'Controller';
        $controller_method = strtolower(self::$router->getMethodPrefix().self::$router->getAction());
        $controller_object = new $controller_class();

        if ( method_exists($controller_object, $controller_method) ) {
            $view_path = $controller_object->$controller_method();
            $view_object = new View($controller_object->getData(),$view_path);
            $content = $view_object->render();
            echo $content;
        }
    }

}
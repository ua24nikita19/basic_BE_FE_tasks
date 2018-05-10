<?php

namespace Application\Core;

use Application\Core\View;

class Controller
{
    public $route;
    public $view;
    public $model;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel('Task');
    }

    //Get route
    public function getRoute()
    {
        return $this->route;
    }

    /** Load model
     * @param [modelName]
     * @return object of Model;
     */
    public function loadModel($modelName)
    {
        $pathToModel = 'Application\Models\\'.$modelName;

        if (class_exists($pathToModel)){
            return new $pathToModel;
        }
        return null;
    }
}
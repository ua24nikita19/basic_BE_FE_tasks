<?php

require_once(ROOT . DS . 'configure' . DS . 'configure.php');

function __autoload($class_name)
{
    $lib_path = ROOT.DS.'lib'.DS.strtolower($class_name).'.class.php';
    $controllers = ROOT.DS.'controllers'.DS.str_replace('controller', '', strtolower($class_name)).'.controller.php';
    $model_path = ROOT.DS.'models'.DS.strtolower($class_name).'.php';

    if (file_exists($lib_path)) {
        require_once($lib_path);

    } elseif (file_exists($controllers) ) {
        require_once ($controllers);

    } elseif ( file_exists($model_path) ) {
        require_once ($model_path);

    } else {
        throw new Exception('Can\'t to load class ');
    }
}

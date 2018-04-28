<?php

define("DS", DIRECTORY_SEPARATOR);
define("ROOT", dirname(dirname(__FILE__)));
define('CONFIG', ROOT.DS.'Application'.DS.'Config');
define('LIB', ROOT.DS.'Application'.DS.'Lib');
define('CORE', ROOT.DS.'Application'.DS.'Core');
define('CONTROLLERS', ROOT.DS.'Application'.DS.'Controllers');

require (ROOT.DS.'Application'.DS.'Lib'.DS.'develop.php');

use Application\Core\Router;

spl_autoload_register(function ($class){
    $inc_class = ROOT.DS.str_replace('\\', DS, $class.'.php');
    if (file_exists($inc_class)){;
        require $inc_class;
    }
});


$router = new Router;
$router->run();
<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT','..'.DS);

require ROOT.DS.'DEVELOP'.DS.'dev_func.php';

function my_autoloader($class) {
    require ROOT.DS.'LIB'.DS. $class . '.php';
}

spl_autoload_register('my_autoloader');

$toConnect = new DB();
$connection = DB::$dbConnection;

$record = $connection->query("SELECT * FROM Films ORDER BY 'title' ASC");
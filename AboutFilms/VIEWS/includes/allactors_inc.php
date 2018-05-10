<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT','..'.DS);

require ROOT.DS.'LIB'.DS.'DB.php';
require ROOT.DS.'DEVELOP'.DS.'dev_func.php';

$toConnect = new DB();
$connection = $toConnect->getConnect();

$records = $connection->query("SELECT * FROM Actors ORDER BY `Name` ASC");
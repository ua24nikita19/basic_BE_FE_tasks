<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT','..'.DS);

require ROOT.DS.'LIB'.DS.'DB.php';
require ROOT.DS.'DEVELOP'.DS.'dev_func.php';

if (isset($_POST['searchValue']) && !empty($_POST['searchValue'])){

    $toConnect = new DB();
    $connection = $toConnect->getConnect();

    $recordWithActor = null;

    if ($_POST['searchParam']=='title'){

        $title = htmlspecialchars(trim($_POST['searchValue'], ' '));
        $record = $connection->query("SELECT * FROM `Films` WHERE title='$title'");
    } elseif($_POST['searchParam']=='star') {

        $star = htmlspecialchars(trim($_POST['searchValue'], ' '));
        $record = $connection->query("SELECT * FROM `Films`");

        while($row=$record->fetch_assoc()) {
            preg_match('\''.ucfirst($star).'[ ][A-za-z]+\'', $row['stars'], $matches);
            array_push($recordWithActor, $row['id']);
        }
        $record = $connection->query("SELECT * FROM `Films`");
    }
}
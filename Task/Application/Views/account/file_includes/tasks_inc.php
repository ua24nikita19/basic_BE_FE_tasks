<?php
use Application\Lib\Session;
use Application\Lib\DB;

$adminSessionName = isset($_SESSION['admin']) ? $_SESSION['admin'] : 'незнакомец';

$countRecords = 3;
$page = 0;

$row = [];
$row = $result[0]->fetch_all(MYSQLI_ASSOC);
$paginationLength = ceil(count($row)/$countRecords);
$doneOrNotDone=0;

for ($i=0;$i<$paginationLength;$i++){
    if (isset($_POST[$i])){
        $page = $_POST[$i];
    }
}

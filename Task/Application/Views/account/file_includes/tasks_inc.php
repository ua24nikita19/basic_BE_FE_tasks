<?php
use Application\Lib\Session;
use Application\Lib\DB;

$adminSessionName = isset($_SESSION['admin']) ? $_SESSION['admin'] : 'незнакомец';

$countRecords = 3;
$page = 0;

$paginationLength = ceil(count($row)/$countRecords);
$doneOrNotDone=0;

$countRows = count($row);
$minusCountRows = 0;

for ($i=0;$i<$paginationLength;$i++){
    if (isset($_GET['page']) == $i){
        $page = $_GET['page'];
    } else {
        $page = 0;
    }
}

if ($page == $paginationLength-1){
    if (preg_match('/\.3+/',$countRows/$countRecords)){
        $minusCountRows = 2;
    } elseif (preg_match('/\.6+/',$countRows/$countRecords)){
        $minusCountRows = 1;
    } else {
        $minusCountRows = 0;
    }
}
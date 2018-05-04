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

$countRows = $result[0]->num_rows;
$minusCountRows = 0;


for ($i=0;$i<$paginationLength;$i++){
    if (isset($_POST[$i])){
        $page = $_POST[$i];
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

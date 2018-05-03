<?php
function lastPart($word){
    $reg = '/result_([0-9]+)/';
    preg_match($reg, $word,$matches);
    $id = array_map(function($e){
        if((int)$e){
            return $e;
        }
        return null;
    },$matches);

    return $id[1];
}
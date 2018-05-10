<?php

function dd($arg){
    echo '<pre>';
    var_dump($arg);
    echo '</pre>';
    exit();
}

function filterAndGetActors ($i1) {

    $i2 = explode(',', $i1);
    $i2[0] = preg_replace('(Stars: )', '', $i2[0]);
    $arrayStars = array_filter($i2, function ($item){
        $item = !preg_match('\<|>|@|[0-9]+|()',$item) ? $item : '';
        return $item;
    });
    $textStars = implode(',', $arrayStars);

    return ['textStars'=>$textStars, 'arrayStars'=>$arrayStars];
}

function cutFirst($str) {

}
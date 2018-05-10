<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);

/** File for additional functions for develop*/

//File for debug some params
function dd($param) {
    echo '<pre><code>';
        var_dump($param);
    echo '</code><pre>';
    die();
}
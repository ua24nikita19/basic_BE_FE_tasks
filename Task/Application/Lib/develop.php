<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);

function dd($param) {
    echo '<pre><code>';
        var_dump($param);
    echo '</code><pre>';
    die();
}
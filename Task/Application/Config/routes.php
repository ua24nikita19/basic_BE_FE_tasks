<?php

use Application\Core\Router;


$uri = trim($_SERVER['REQUEST_URI'], '/');

if (preg_match('/page=[0-9]+/', $uri, $matches)){
    $pageNumFromRoute = $matches[0];
} else {
    $pageNumFromRoute = '/page=0';
}

if (preg_match('/sort=(email|username|status)/', $uri, $matches)){
    $sortBy = $matches[1];
}

if (isset($sortBy)){
    $pageNumFromRouteWithSort = $pageNumFromRoute.'&sort='.$sortBy;
}else {
    $pageNumFromRouteWithSort ='';
}

return [

    'login' => [

        'controller' => 'account',
        'action' => 'login'
    ],

    'task' => [
        'controller' => 'account',
        'action' => 'tasks'
    ],

    'task?sort=name' => [
      'controller' => 'account',
      'action' => 'tasksSortByName'
    ],

    'task?sort=state' => [
        'controller' => 'account',
        'action' => 'tasksSortByState'
    ],

    'task?'.$pageNumFromRoute => [
        'controller' => 'account',
        'action' => 'pagination'
    ],

    'task?'.$pageNumFromRouteWithSort => [
        'controller' => 'account',
        'action' => 'paginationWithSort'
    ],

    'addtask' => [
        'controller' => 'account',
        'action' => 'addtask'
    ],

    'editrec' => [
        'controller' => 'account',
        'action' => 'editrec'
    ]

];
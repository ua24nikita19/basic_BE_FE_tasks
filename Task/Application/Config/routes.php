<?php

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

    'task?sort=email' => [
        'controller' => 'account',
        'action' => 'tasksSortByEmail'
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
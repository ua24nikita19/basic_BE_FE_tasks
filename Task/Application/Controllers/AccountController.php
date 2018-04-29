<?php

namespace Application\Controllers;

use Application\Core\Controller;
use Application\Lib\DB;

class AccountController extends Controller {

    public function loginAction()
    {
        $this->view->render('Вход');
    }

    public function tasksAction()
    {
        $db = new DB;
        $result = $db->query('SELECT * FROM tasks');
        $result2['result'] = [$result];
        $this->view->render('Задачи', $result2);
    }

    public function addtaskAction() {
        $this->view->render('Добавить');
    }

    public function tasksSortByNameAction(){
        $db = new DB;
        $result = $db->query('SELECT * FROM tasks ORDER BY username');
        $result2['result'] = [$result];
        $this->view->render('Задачи', $result2, 'account/tasks');
    }

    public function tasksSortByEmailAction(){
        $db = new DB;
        $result = $db->query('SELECT * FROM tasks ORDER BY email');
        $result2['result'] = [$result];
        $this->view->render('Задачи', $result2, 'account/tasks');
    }

    public function editrecAction(){
        $db = new DB;
        $result = $db->query('SELECT * FROM tasks ORDER BY email');
        $result2['result'] = [$result];
        $this->view->render('Задачи', $result2);
    }

}
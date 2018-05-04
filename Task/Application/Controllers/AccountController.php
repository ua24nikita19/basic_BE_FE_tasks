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

    public function editrecAction(){
        $db = new DB;
        $result = $db->query('SELECT * FROM tasks ORDER BY email');
        $result2['result'] = [$result];
        $this->view->render('Задачи', $result2);
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

    public function tasksSortByStateAction() {
        $db = new DB;
        $result = $db->query('SELECT * FROM tasks ORDER BY status');
        $result2['result'] = [$result];
        $this->view->render('Задачи', $result2, 'account/tasks');
    }

    public function paginationAction(){
        $db = new DB;
        $result = $db->query('SELECT * FROM tasks');
        $result2['result'] = [$result];
        $this->view->render('Задачи', $result2, 'account/tasks');
    }

    public function paginationWithSortAction(){
        $db = new DB;
        $sortField = $_GET['sort'];
        $result = $db->query("SELECT * FROM tasks ORDER BY $sortField  ASC");
        $result2['result'] = [$result];
        $this->view->render('Задачи', $result2, 'account/tasks');
    }

}
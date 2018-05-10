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
        $result['row'] = $this->loadModel('Task')->getAllRecords();
        $this->view->render('Задачи', $result);
    }

    public function addtaskAction()
    {
        $this->view->render('Добавить');
    }

    public function editrecAction()
    {
        $result['row'] = $this->loadModel('Task')->getAllRecords();
        $this->view->render('Задачи', $result);
    }

    public function paginationAction()
    {
        $result['row'] = $this->loadModel('Task')->getAllRecords();
        $this->view->render('Задачи', $result, 'account/tasks');
    }

    public function paginationWithSortAction()
    {
        $result['row'] = $this->loadModel('Task')->getRecordSortedByParam($_GET['sort']);
        $this->view->render('Задачи', $result, 'account/tasks');
    }

}
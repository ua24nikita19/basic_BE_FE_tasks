<?php

class PagesController extends Controller
{
    public function index() {
        $this->data['test_content'] =  '[index]Hello';
    }

    public function view() {
        $this->data['content'] = '[view]The first parametr is - ';
    }
}
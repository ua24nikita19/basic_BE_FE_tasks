<?php

class classSession
{
    public static $started = false;

    public function __construct($runSession = false)
    {
        if ($runSession === true) {
            $this->startSession();
            self::$started = true;
        }
    }

    protected function startSession()
    {
        session_start();
    }

    protected function stopSession()
    {
//        if(session_id()!=""){
//            session_destroy();
//        }
        if (self::$started == true) {//ЕСЛИ МЫ СОЗДАДИМ НОВОЫЙ ОБЪЕКТ КЛАССА, ТО СТАТИК $started будет false для каждого нового?
            session_unset();
        }
    }

    public static function getSession($name)
    {
        if ($_SESSION[$name]) {
            return $_SESSION[$name];
        }
        return null;
    }

    public static function setSession($name, $value): void
    {
        if (!isset($_SESSION[$name])) {
            $_SESSION[$name] = $value;
        }
    }

    public function __isset($name)
    {
        if (isset($name)) {
            return $name;
        }
        return null;
    }
}



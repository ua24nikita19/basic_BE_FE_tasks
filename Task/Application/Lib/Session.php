<?php

namespace Application\Lib;


class Session
{
    protected static $started = false;
    public function __construct($runSession = false)
    {
        if ($runSession === true) {
            self::$started = true;
        }
    }
    public function startSession()
    {
        if(self::$started){
            session_start();
        }
    }
    public function stopSession()
    {
        if (self::$started == true) {
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
    public static function setSession($name, $value)
    {
        $_SESSION[$name] = $value;
    }
    public function __isset($name)
    {
        if(isset($_SESSION['name'])){
            return true;
        }
        return false;
    }
}
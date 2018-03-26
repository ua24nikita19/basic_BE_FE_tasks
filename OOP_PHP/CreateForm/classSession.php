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

    public static function setSession($name, $value): void
    {
        if (!isset($_SESSION[$name])) {
            $_SESSION[$name] = $value;
        }
    }
}



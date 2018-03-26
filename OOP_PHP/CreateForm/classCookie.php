<?php

class Cookie{

    public static $counter=0;

    public function setCookie($name,$value,$time=0,$inc=false){
            setcookie("{$name}",$value,time()+(int)$time);
            return $value;
    }

    public function getCookie($name){
        if (isset($_COOKIE["{$name}"])){
            return $_COOKIE["{$name}"];
        }
        return null;
    }

    public function deleteCookie($name){
        setcookie("{$name}");
    }
}

$cookie = new Cookie;
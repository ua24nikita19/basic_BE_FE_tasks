<?php

namespace Application\Lib;


class LoginForm
{
    private $username;
    private $password;


    public function __construct(Array $data)
    {
        $this->username = isset($data['a_name']) ? $data['a_name'] : null ;
        $this->password = isset($data['a_pass']) ? $data['a_pass'] : null ;
    }

    public function validate()
    {
        return !empty($this->username) && !empty($this->password);
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
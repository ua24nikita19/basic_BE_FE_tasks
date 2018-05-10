<?php

namespace Application\Core;

use Application\Lib\DB;

abstract class Model
{
    public $db;

    public function __construct()
    {
        $connection = new DB();
        $this->db = $connection::$dbConnection;
    }
}
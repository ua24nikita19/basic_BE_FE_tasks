<?php

namespace Application\Lib;

class DB
{
    public static $dbConnection;

    public function __construct()
    {
        $cridentials = require ROOT.DS.'Application'.DS.'Config'.DS.'db.php';
        self::$dbConnection = mysqli_connect($cridentials['host'], $cridentials['user'],
              $cridentials['pass'], $cridentials['name']);
    }

    public function getConnect()
    {
        return self::$dbConnection;
    }

    public function disconnect()
    {
        mysqli_close(self::$dbConnection);
    }

    public function query($queryString)
    {
        return mysqli_query(self::$dbConnection, $queryString);
    }

}
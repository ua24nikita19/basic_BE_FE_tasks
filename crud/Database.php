<?php

class Database
{
    private static $dbConnection;

    public function __construct($host, $user, $password, $database)
    {

        self::$dbConnection = mysqli_connect($host, $user, $password, $database);
    }

    public function getConnect(){
        return self::$dbConnection;
    }

    public function disconnect(){
        mysqli_close(self::$dbConnection);
    }

    public function query($queryString){
        return mysqli_query(self::$dbConnection, $queryString);
    }

    public function rollBackDelete(){

    }
}
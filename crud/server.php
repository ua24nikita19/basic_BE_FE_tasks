<?php

require ('Session.php');
require ('Database.php');

$sessionObj = new Session(true);
$sessionObj->startSession();


$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = 'rfhgtyrj95';
$dbName = 'users';
$connection = new Database($dbHost, $dbUser, $dbPassword, $dbName);

$name = '';
$pass = '';
$id = 0;
$editState = false;

//Insert a record
if (isset($_POST['save'])) {

    $name = $_POST['name'];
    $pass = $_POST['pass'];

    $connection->query("INSERT INTO members (id_member, name, pass) VALUES (NULL, '$name', '$pass')");
    Session::setSession('msg', 'You added a new record');
    header('location: in.php');
}

//Update the record
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $id = $_POST['id'];

    $connection->query("UPDATE members SET name ='$name',pass='$pass' WHERE id_member = $id ");
    Session::setSession('msg', 'You updated the record');
    header('location: in.php');

}

//Delete the record
if (isset($_GET['del'])) {

    $id = $_GET['del'];
    $connection->query("DELETE FROM members WHERE id_member = $id");
    $sessionObj->stopSession();
    Session::setSession('msg', 'You deleted the record');
    header('location: in.php');
}

//retrieve records
$resultSelect = $connection->query("SELECT * FROM members");


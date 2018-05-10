<?php

use Application\Lib\DB;

if (!isset($_SESSION['admin'])) {
    header('location:'.'/task');
}

$create_connection = new DB();
$connection = $create_connection->getConnect();
$getRecordById = $connection->query("SELECT * FROM tasks WHERE id={$_SESSION['edit_record']}");
$editRecord = $getRecordById->fetch_assoc();

if (isset($_POST['change'],$_SESSION['admin'])) {
    if (isset($_POST['e_username'],$_POST['e_email'],$_POST['e_text'])) {
        $username = htmlspecialchars($_POST['e_username']);
        $email = htmlspecialchars($_POST['e_email']);
        $text = htmlspecialchars($_POST['e_text']);
        $id = $_SESSION['edit_record'];
        $changeRecordTable = $connection->query("UPDATE tasks SET username='$username',email='$email',text='$text' WHERE id='$id'");
        header('location:'.'/task');
    }
}
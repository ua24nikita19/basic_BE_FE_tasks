<?php
use Application\Lib\LoginForm;
use Application\Lib\DB;
use Application\Lib\Session;

if (isset($_POST['a_name'], $_POST['a_pass'])) {

    $login = new LoginForm($_POST);
    $name = $login->getUsername();
    $password = $login->getPassword();

    $db = new DB();
    $dbC = DB::$dbConnection;

    $adminRecord = $dbC->query("SELECT * FROM admin");
    $admin = mysqli_fetch_assoc($adminRecord);

    if ($name == $admin['name'] && $password == $admin['password']) {
        Session::setSession('admin', 'admin');
        header('location: ' . '/task');
    } else {
        header('location: ' . '/login');
    }
}
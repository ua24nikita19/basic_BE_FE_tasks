<?php
use Application\Lib\DB;
include ROOT.DS.'Application'.DS.'Views'.DS.'account'.DS.'functions'.DS.'lastpart.php';
$arrayStatesTask = [];

if (isset($_SESSION['admin'])) {
    if (isset($_POST['test']))
    {
        $create_connection = new DB();
        $connection = $create_connection->getConnect();

        foreach($_POST as $k => $v) {
            if (preg_match("/result_[0-9]+$/", $k)) {
                $arrayStatesTask[$k] = $v;
                $id = lastPart($k);
                $changeStateTable = $connection->query("UPDATE tasks SET status='$v' WHERE id='$id'");
            }
        }

        header('location:'.'/task');
    }
}

if (isset($_POST['id'])) {
    $_SESSION['edit_record'] = $_POST['id'];
    header('location: '. '/editrec');
}

if (isset($_POST['exit']))
{
    unset($_SESSION['admin']);
    header('location:'. '/task');
}

if (isset($_POST['username'], $_POST['email'], $_POST['text'])){

    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $text = htmlspecialchars($_POST['text']);
    $createConnection = new DB();
    $connection = DB::$dbConnection;
    $addRec = mysqli_query($connection,"INSERT INTO tasks (id, username, email, text) VALUES (null,'$username','$email','$text')");
    echo '<a href="/task">Back</a>';
}

if (isset($_POST['sign_in'])){
    header('location: '.'/login');
}
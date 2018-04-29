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
?>
<form id="register" method="post" action="/login">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="email" name="a_name">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" placeholder="password" name="a_pass">
    </div>
<!--    <div class="form-check">-->
<!--        <input type="checkbox" class="form-check-input">-->
<!--        <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
<!--    </div>-->
    <button type="submit" class="btn btn-primary">Sign in</button><br>
    <br>
</form>
<a href="/task" class="badge badge-info" name="back_task">К списку задач</a>
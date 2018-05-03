<?php

//Application/Views/account/file_includes/login_inc.php
include ROOT.DS.'Application'.DS.'Views'.DS.'account'.DS.'file_includes'.DS.'login_inc.php';

?>
<form id="register" method="post" action="/login">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="email" name="a_name">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" placeholder="password" name="a_pass">
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button><br>
    <br>
</form>
<a href="/task" class="badge badge-info" name="back_task">К списку задач</a>
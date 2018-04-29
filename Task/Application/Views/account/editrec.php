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

?>
<form action="/editrec" method="post" style="width: 350px; text-align: center; margin: 0 auto;" >
    <input type="hidden" name="editNote">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Name</span>
        </div>
        <input type="text" class="form-control" name="e_username" value="<?php echo $editRecord['username'] ?>">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">e-mail</span>
        </div>
        <input type="text" class="form-control" name="e_email" value="<?php echo $editRecord['email'] ?>">
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Memo</span>
        </div>
        <textarea rows="10" class="form-control" name="e_text"><?php echo $editRecord['text'] ?></textarea>
    </div>
    <button type="submit" name="change" class="btn btn-outline-success">Изменить</button>
</form>
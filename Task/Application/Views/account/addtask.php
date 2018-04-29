<?php
    use Application\Lib\DB;

    if (isset($_POST['id'])) {
        $_SESSION['edit_record'] = $_POST['id'];
        header('location: '. '/editrec');
    }

    if (isset($_POST['exit']))
    {
            unset($_SESSION['admin']);
            header('location:'. '/task');
    }
//    if (isset($_FILES[$_POST['image_id']]['name'])) {
//        $uploadDir = ROOT.DS.'Public/Images/';
//        $uploadFile = $uploadDir . basename($_FILES[$_POST['image_id']]['name']);
//        copy($_FILES[$_POST['image_id']]['name'], $uploadDir);
//    }
    if (isset($_POST['username'], $_POST['email'], $_POST['text'])){

        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $text = htmlspecialchars($_POST['text']);
        $createConnection = new DB();
        $connection = DB::$dbConnection;
        $addRec = mysqli_query($connection,"INSERT INTO tasks (id, username, email, text) VALUES (null,'$username','$email','$text')");
        echo '<a href="/task">Back</a>';
    }
?>

<?php if (isset($_POST['addNote'])): ?>
<form action="/addtask" method="post" enctype="multipart/form-data" style="width: 350px; text-align: center; margin: 0 auto;" >
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Name</span>
        </div>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">e-mail</span>
        </div>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Memo</span>
        </div>
        <textarea rows="10" class="form-control" name="text"></textarea>
    </div>
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <input name="<?php echo $_POST['image_id'] ?>" type="file" />
    <button type="submit" class="btn btn-outline-success">Добавить</button>
    <input type="hidden" name="image_id" value="<?php echo $_POST['image_id'] ?>">
</form>
<?php endif; ?>
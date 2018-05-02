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
<form action="/addtask" method="post" id="addtask" >
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

    <button id="submit" type="button" class="btn btn-outline-success">Добавить</button><br>
    <a href="/task" class="badge badge-info" name="back_task">К списку задач</a>
    <div id="modal">
        <div class="modal-content">
            <div class="modal-title">
                Вы действительно хотите добавить эти данные?
            </div>
            <div class="modal-main">
                <p>Имя: <span class="name_span"></span></p>
                <br><p>E-mail: <span class="email_span"></span></p>
                <br><p>Текст:</p>
                <pre class="txt_span">
                </pre>
            </div>
            <div class="modal-response">
                <button type="submit" class="modal-btn-add">Добавить</button>
                <button type="button" class="modal-btn-cancel">Отменить</button>
            </div>
        </div>
    </div>
</form>
<?php endif; ?>

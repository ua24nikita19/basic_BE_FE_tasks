<?php
error_reporting(0);
//Application/Views/account/file_includes/addtask_inc.php
include ROOT.DS.'Application'.DS.'Views'.DS.'account'.DS.'file_includes'.DS.'addtask_inc.php';

?>

<?php if (isset($_POST['addNote'])): ?>
<form action="/addtask" method="post" id="addtask" enctype="multipart/form-data">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text t">Name</span>
        </div>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text t">e-mail</span>
        </div>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text t">Memo</span>
        </div>
        <textarea rows="10" class="form-control" name="text" maxlength="400"></textarea>
    </div>
    <input id="img" name="imgfile" type="file">
    <button id="submit" type="button" class="btn btn-outline-success t">Add</button><br>
    <a href="/task" class="badge badge-info t" name="back_task">Go back</a>
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

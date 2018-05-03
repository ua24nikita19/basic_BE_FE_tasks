<?php

//Application/Views/account/file_includes/editrec_inc.php
include ROOT.DS.'Application'.DS.'Views'.DS.'account'.DS.'file_includes'.DS.'editrec_inc.php';

?>
<form action="/editrec" method="post" class="edit_form" >
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
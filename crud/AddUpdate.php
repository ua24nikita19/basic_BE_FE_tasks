<!DOCTYPE html>
<html>
<head>
    <title>Изменить таблицу</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require('server.php');
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $editState = true;
    $rec = $connection->query("SELECT * FROM members WHERE id_member=$id");
    $record = mysqli_fetch_array($rec);
    $name = $record['name'];
    $pass = $record['pass'];
    $id = $record['id_member'];
}
?>

<form method="POST" action="server.php" class="form-control">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="text" name="pass" value="<?php echo $pass; ?>">
    </div>
    <?php if ($editState == false): ?>
        <button type="submit" class="btn btn-success" name="save">Save</button>
    <?php else: ?>
        <button type="submit" class="btn btn-success" name="update">Update</button>
    <?php endif; ?>

</form>

</body>
</html>
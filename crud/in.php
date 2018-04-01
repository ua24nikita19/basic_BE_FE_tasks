<!DOCTYPE html>
<html>
<head>
    <title>Таблица</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

require('server.php');

?>

<table class="table table-bordered">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th>Password</th>
        <th colspan="2">Action <a href="AddUpdate.php" class="badge badge-success">Добавить</a>
            <?php if (Session::getSession('msg')): ?>
<!--                <div class="msg">-->
                    <?php
                        echo '<span class="badge badge-secondary">' . Session::getSession('msg') . '</span>';
                    ?>
<!--                </div>-->
            <?php endif; ?>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_array($resultSelect)):
        ?>
        <tr>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['pass'] ?></td>
            <td>
                <a href="AddUpdate.php?edit=<?php echo $row['id_member']; ?>" class="badge badge-warning">Редактировать</a>
            </td>
            <td>
                <a href="in.php?del=<?php echo $row['id_member']; ?>" class="badge badge-danger"
                   name="delete">Удалить</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
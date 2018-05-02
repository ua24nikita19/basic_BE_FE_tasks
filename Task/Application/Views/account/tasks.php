<?php
use Application\Lib\Session;

$adminSessionName = isset($_SESSION['admin']) ? $_SESSION['admin'] : 'незнакомец';
$countRecords = 3;
$page = 0;


$row = [];
$row = $result[0]->fetch_all(MYSQLI_ASSOC);
$paginationLength = floor(count($row)/$countRecords);

for ($i=0;$i<$paginationLength;$i++){
    if (isset($_POST[$i])){
        $page = $_POST[$i];
    }
}

?>

<form action="/addtask" method="post">
    <input type="hidden" name="addNote">
    <span class="admin">Привет <?php echo $adminSessionName ?></span>
    <a href="/login" class="btn-login">Вход</a>
    <?php if (isset($_SESSION['admin'])): ?>
    <button type="submit" class="btn-exit" name="exit">Выход</button>
    <?php endif; ?>
    <button type="submit" class="btn-addd">Добавить задачу</button>
    <table class="table table-bordered table-dark">
        <thead>
        <tr>
            <?php if (isset($_SESSION['admin'])): ?>
            <th scope="col"></th>
            <?php endif; ?>
            <th scope="col"><a href="?sort=name">Имя</a></th>
            <th scope="col"><a href="?sort=email">e-mail</a></th>
            <th scope="col"><span class="t">Текст</span></th>
            <th scope="col"><span class="t">Картинка</span></th>
            <th scope="col"><a href="#">Время</a></th>
        </tr>
        </thead>
<!--        --><?php //while($row = $result[0]->fetch_assoc()):?>
        <?php for($i=$page*$countRecords; $i<($page+1)*$countRecords; $i++): ?>
        <tbody>
        <tr>
            <?php if (isset($_SESSION['admin'])): ?>
            <th scope="row" width="5%"><button type="submit" name="id" value="<?php echo $row[$i]['id'] ?>"><img src="https://png.icons8.com/color/24/000000/edit.png"></button></th>
            <?php endif; ?>
            <td width="15%"><?php echo $row[$i]['username'] ?></td>
            <td width="15%"><?php echo $row[$i]['email'] ?></td>
            <td width="30%"><pre><?php echo $row[$i]['text'] ?></pre></td>
            <td width="10%"></td>
            <td width="10%"><?php echo $row[$i]['datetime'] ?></td>
        </tr>
        <?php

        endfor;
        ?>
<!--        --><?php //$id=$row['id']; endwhile;  ?>
<!--        <input type="hidden" name="image_id" value="--><?php //echo $id ?><!--">-->
        </tbody>
    </table>

</form>
<form method="post" action="/task">
    <ul class="pagination">
        <?php for ($i=0;$i<$paginationLength;$i++):?>
            <li><button name="<?php echo $i ?>" value="<?php echo $i ?>"><?php echo $i+1; ?></button></li>
        <?php endfor; ?>
    </ul>
</form>
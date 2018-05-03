<?php
error_reporting(0);
//Application/Views/account/file_includes/tasks_inc.php
include ROOT.DS.'Application'.DS.'Views'.DS.'account'.DS.'file_includes'.DS.'tasks_inc.php';

?>

<form action="/addtask" method="post" >
    <input type="hidden" name="addNote">
    <span class="admin">Привет <?php echo $adminSessionName ?></span>
<!--    <a href="/login" name="sign_in" class="btn-login">Вход</a>-->
    <button type="submit" class="btn-login" name="sign_in">Вход</button>
    <?php if (isset($_SESSION['admin'])): ?>
    <button type="submit" class="btn-exit" name="exit">Выход</button>
    <button type="submit" name="test" class="btn-status">Изменить статус</button>
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
            <th scope="col" width="300px"><span class="t">Текст</span></th>
            <th scope="col"><span class="t">Картинка</span></th>
            <th scope="col"><a href="#">Время</a></th>
            <th scope="col"><a href="#">Статус</a></th>
        </tr>
        </thead>
        <?php for($i=$page*$countRecords; $i<($page+1)*$countRecords; $i++): ?>
        <tbody>
        <tr>
            <?php if (isset($_SESSION['admin'])):

                  $status = $row[$i]['status'];
                  $checked = 0;
                  $res = $status == $checked ? 'checked' : '';
            ?>
            <th scope="row" width="8%">
                <button type="submit" name="id" value="<?php echo $row[$i]['id'] ?>"><img src="https://png.icons8.com/color/24/000000/edit.png"></button><Br>
                <input type="radio" name="result_<?php echo $row[$i]['id']?>" value="1" <?php echo $res;$checked=$status; ?> >Done<Br>
                <input type="radio" name="result_<?php echo $row[$i]['id'] ?>" value="0" <?php echo $res;$checked=$status; ?> > Not done<Br>
            </th>
            <?php endif; ?>
            <td width="15%"><?php echo isset($row[$i]['username'])? $row[$i]['username'] : ''?></td>
            <td width="15%"> <?php echo isset($row[$i]['email'])? $row[$i]['email'] : '' ?> </td>
            <input type="hidden" name="user_<?php echo $row[$i]['email'] ?>">
            <td width="30%"><?php echo nl2br(isset($row[$i]['text'])? $row[$i]['text'] : '') ?></td>
            <td width="10%">
                <?php
                    $img = isset($row[$i]['image']) ? $row[$i]['image'] : '';
                    if($img) echo '<img src="'.$row[$i]['image'].'"'.' width=100;height=100;>'
                ?>
            </td>
            <td width="10%"><?php echo isset($row[$i]['datetime'])? $row[$i]['datetime'] : '' ?></td>
            <td width="10%"><?php
                $statusRecord = isset($row[$i]['status']) ? $row[$i]['status'] : '';
                echo boolval($statusRecord)? 'Выполнено' : 'Не выполнено';
                ?>
            </td>
        </tr>
        <?php endfor; ?>
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
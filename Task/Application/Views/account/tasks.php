<?php
use Application\Lib\Session;

$adminSessionName = isset($_SESSION['admin']) ? $_SESSION['admin'] : 'незнакомец';


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
        <?php while($row = $result[0]->fetch_assoc()): ?>
        <tbody>
        <tr>
            <?php if (isset($_SESSION['admin'])): ?>
            <th scope="row" width="5%"><button type="submit" name="id" value="<?php echo $row['id'] ?>"><img src="https://png.icons8.com/color/24/000000/edit.png"></button></th>
            <?php endif; ?>
            <td width="15%"><?php echo $row['username'] ?></td>
            <td width="15%"><?php echo $row['email'] ?></td>
            <td width="30%"><pre><?php echo $row['text'] ?></pre></td>
            <td width="10%"></td>
            <td width="10%"><?php echo $row['datetime'] ?></td>
        </tr>
        <?php $id=$row['id']; endwhile;  ?>
        <input type="hidden" name="image_id" value="<?php echo $id ?>">
        </tbody>
    </table>
</form>
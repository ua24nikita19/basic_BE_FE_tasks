<?php
error_reporting(0);
//Application/Views/account/file_includes/tasks_inc.php
include ROOT.DS.'Application'.DS.'Views'.DS.'account'.DS.'file_includes'.DS.'tasks_inc.php';

?>

<form action="/addtask" method="post" >
    <input type="hidden" name="addNote">
    <span class="admin">Привет <?php echo $adminSessionName ?></span>
    <button type="submit" class="btn-login" name="sign_in">Sign in</button>
    <?php if (isset($_SESSION['admin'])): ?>
    <button type="submit" class="btn-exit" name="exit">Sign out</button>
    <button type="submit" name="test" class="btn-status">Change state</button>
    <?php endif; ?>
    <button type="submit" class="btn-addd">Add new task</button>
    <table class="table table-bordered table-dark">
        <thead>
        <tr>
            <?php if (isset($_SESSION['admin'])): ?>
            <th scope="col">Action</th>
            <?php endif; ?>
            <th scope="col"><span class="t"><a href="task?page=<?php echo isset($_GET['page'])?$_GET['page']:0 ?>&sort=username">Name</a></span></th>
            <th scope="col"><span class="t"><a href="task?page=<?php echo isset($_GET['page'])?$_GET['page']:0 ?>&sort=email">E-mail</a></span></th>
            <th scope="col" width="300px"><span class="t">Text</span></th>
            <th scope="col"><span class="t">Image</span></th>
            <th scope="col"><span class="t"><a href="">Time</a></span></th>
            <th scope="col"><a href="task?page=<?php echo isset($_GET['page'])?$_GET['page']:0 ?>&sort=status"><span class="t">State</span></a></th>
        </tr>
        </thead>
        <?php for($i=$page*$countRecords; $i<($page+1)*$countRecords-$minusCountRows; $i++): ?>
        <tbody>
        <tr>
            <?php if (isset($_SESSION['admin'])):

                  $status = $row[$i]['status'];
                  $checked = 0;
                  $res = $status == $checked ? 'checked' : '';
            ?>
            <td scope="row" width="8%">
                <button type="submit" name="id" value="<?php echo $row[$i]['id'] ?>"><img src="https://png.icons8.com/color/24/000000/edit.png"></button><Br>
                <div class="state"><input type="radio" name="result_<?php echo $row[$i]['id']?>" value="1" <?php echo $res;$checked=$status; ?> ><span class="t">Done</span></div>
                <div class="state"><input type="radio" name="result_<?php echo $row[$i]['id'] ?>" value="0" <?php echo $res;$checked=$status; ?> > <span class="t">Not done</span></div>
            </td>
            <?php endif; ?>
            <td width="15%"><?php echo isset($row[$i]['username'])? $row[$i]['username'] : '-'?></td>
            <td width="15%"> <?php echo isset($row[$i]['email'])? $row[$i]['email'] : '-' ?> </td>
            <input type="hidden" name="user_<?php echo $row[$i]['email'] ?>">
            <td width="30%"><?php echo nl2br(isset($row[$i]['text'])? $row[$i]['text'] : '-') ?></td>
            <td width="10%">
                <?php
                    $img = $row[$i]['image']==NULL ? '-' : $row[$i]['image'];
                    if($img!='-') {echo '<img src="'.$row[$i]['image'].'"'.' width=100;height=100;>';}
                    else echo $img;
                ?>
            </td>
            <td width="10%"><?php echo isset($row[$i]['datetime'])? $row[$i]['datetime'] : '-' ?></td>
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

    <ul class="pagination">
        <?php for ($i=0;$i<$paginationLength;$i++):
            if (!isset($_GET['sort'])):
        ?>

            <li><a href="?page=<?php echo $i ?>"><?php echo $i+1; ?></a></li>
        <?php
            else:
        ?>
                <li><a href="?page=<?php echo $i ?>&sort=<?php echo $_GET['sort'] ?>"><?php echo $i+1; ?></a></li>
        <?php
        endif;
        endfor;
        ?>
    </ul>

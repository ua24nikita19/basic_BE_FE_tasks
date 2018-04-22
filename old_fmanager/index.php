<?php

function cutLastDir ($back) {
    $goBack = explode('/',$back);
    unset($goBack[count($goBack)-1]);
    return implode('/',$goBack);
}

function arrayToString ( array $arr) {

    foreach ($arr as $key => $item) {
        if ($item == '.' || $item == '..'){
            unset($arr[$key]);
        }
    }
    $string = implode(' ', $arr);

    return $string;
}

function showInnerDir ($currentDir) {

    $items = arrayToString(scandir($currentDir));
    $items = explode(' ',$items);

    for($i=0;$i<count($items);$i++){
        if (is_dir($currentDir.'/'.$items[$i]) && $items[0]!='') {
            echo '<img src="https://png.icons8.com/color/16/000000/folder-invoices.png">';
        } else if (!is_dir($currentDir.'/'.$items[$i])) {
            echo '<img src="https://png.icons8.com/color/16/000000/document.png">';
        } else {
            echo '[Пусто]';
        }
        echo $items[$i].'<br>';
    }
}

if (isset($_POST['nameDir'], $_POST['createDir'])) {
    if ($_POST['nameDir']==getLastOfPath($_POST['currentDir'])) {
        echo '<b>'.'Нельзя создать каталог с родительским именем'.'</b>';
    }else{
        createDir();
        echo '<p><b>'.'Каталог создан.'.'</b></p>';
    }
}

if (isset($_POST['del_last_dir'],$_POST['del_name'])) {
    if (!empty($_POST['del_name'])){
        deleteFile();
    } else {
        echo '<b>Введите название каталога</b>';
    }
}

if (isset($_POST['rename_last_file'],$_POST['new_name_dir'])){

    renameLastFile();
    echo '<p><b>'.'Каталог переименован.'.'</b></p>';
}

function createDir () {
    $dir = $_POST['currentDir'].'/'.$_POST['nameDir'];
    mkdir("{$dir}");
    chmod("{$dir}", 0777);
}

function renameLastFile () {
    $dirOld = $_POST['currentDir'].'/'.$_POST['last_name'];
    $dirNew = $_POST['currentDir'].'/'.$_POST['new_name_dir'];
    rename("{$dirOld}", "{$dirNew}");

}

function deleteFile () {
    $dir = $_POST['currentDir'].'/'.$_POST['del_name'];

    if (is_dir($dir)) {
        if(count( scandir( $dir) ) > 0) {
            delTree($dir);
        }else {
            rmdir($dir);
        }
        echo '<p><b>'.'Каталог удален.'.'</b></p>';
    } else {
        unlink($dir);
    }
}

function correctingPath ($pathMain){
    $path = explode('/',$pathMain);
    $path1 = array_unique($path);
    $path2 = implode('/',$path1);
    return $path2;
}

function delTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
}

function getLastOfPath ($path) {
    $arrPath = explode('/', $path);
    $countItem = count($arrPath);
    for ($i=0;$i<$countItem-1;$i++){
        unset($arrPath[$i]);
    }
    return implode('/',$arrPath);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method="POST">
<div class="left">
        <?php
        //Задаем базовый путь от которого можно будет переходить в другие каталоги
        if(isset($_POST['currentDir'])){
            $baseDir = $_POST['currentDir'];
        }else {
            $baseDir = dirname(__FILE__);
        }
        if (isset($_POST['dir'])) {
            $nextDir = '/' . $_POST['dir'];
        } else {
            $nextDir = '/';
        }

        //Переменная для отображения текущего расположения
        if (is_dir($_POST['currentDir'].$nextDir)){
            $currentPath = $baseDir.$nextDir;
        }else {
            $currentPath = $baseDir;
        }


        //Выводим содержимое текущего каталога
        echo 'Содержимое:<br>'.'<span>';
            if (isset($_POST['ahead']) && is_dir($currentPath)) {
                showInnerDir($currentPath);
            }else if (isset($_POST['back'])) {
                showInnerDir(cutLastDir($_POST['currentDir']));
                $currentPath = cutLastDir($_POST['currentDir']);
            } else {
                showInnerDir($baseDir);
            }
        echo '</span>';
        ?>
</div>
        <div class="currentDir"><?php echo /*@$currentPath;*/correctingPath($currentPath); ?></div>
<div class="right">
        <p>Действия:</p>
        <input type="text" name="nameDir" placeholder="Название каталога">
        <input type="submit" name="createDir" value="Создать"><br><br>

        <input type="text" name="last_name" placeholder="Название которое следует изменить">
        <input type="text" name="new_name_dir" placeholder="Новое название">
        <input type="submit" name="rename_last_file" value="Переименовать"><br><br>

        <input type="text" name="del_name" placeholder="Название">
        <input type="submit" name="del_last_dir" value="Удалить"><br>
        <input type="hidden" name="currentDir" value="<?php echo correctingPath($currentPath);/* $currentPath*/ ?>"><br>

        <input type="text" name="dir" placeholder="Перейти в каталог">
        <input type="submit" name="ahead" value="Открыть">
        <input type="submit" name="back" value="Назад">
</div>
    </form>

</body>
</html>
<?php
/*
 Написать файл менеджер с возможностями:
 переименование, удаление, редактирование, создание директорий
 */

//$currentDir = "./";
//$currentFile = $currentDir . basename($_FILES['userfile']['name']);


$currentNameFIle = $_POST['nameDir'];

if (isset($_POST['nameDir'], $_POST['createDir'])) {

    createDir();
    echo '<p>'.'Каталог создан.'.'</p>';

}
if (isset($_POST['rename_last_file'],$_POST['new_name_dir'])){

        renameLastFile();
        echo '<p>'.'Каталог переименован.'.'</p>';
}
if (isset($_POST['del_last_dir'],$_POST['nameDir'])) {
    deleteFile();
}

function arrayToString ( array $arr) {

     foreach ($arr as $key => $item) {
         if ($item == '[.]+'){
             unset($arr[$key]);
         }
     }
    $string = implode($arr);

    return $string;
}

function deleteFile () {
    if (is_dir($_POST['del_name'])) {
        rmdir($_POST['del_name']);
        echo '<p>'.'Каталог удален.'.'</p>';
    }
}

function changeDir ($nameDir) {

}

function createDir () {
    mkdir("{$_POST['nameDir']}");
    chmod("{$_POST['nameDir']}", 0777);
}

function renameLastFile () {

    rename("{$_POST['last_name']}", "{$_POST['new_name_dir']}");

}
?>
<a href="index.php">Обратно к менеджеру</a>

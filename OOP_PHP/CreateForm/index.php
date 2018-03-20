<?php

require('classSession.php');
require('classSmartForm.php');
require('classCookie.php');
require('classFlash.php');

//Создаем сессию (класс сессий)
$session = new classSession(true);
$session->setSession('userIP', $_SERVER['HTTP_USER_AGENT']);
$echo = $session->getSession('userIP');

$flash = new classFlash;
$flash->setMessage('Success');
$echo1 = $flash->getMessage();

//Записываем куку-счетчик обновления страницы (класс куки)
if ($cookie->getCookie('countVisits') != null) {
    Cookie::$counter = $_COOKIE['countVisits'] + 1;
} else {
    Cookie::$counter++;
}
$cookie->setCookie('countVisits', Cookie::$counter, 10);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .form {
            border: 1px solid black;
            width: 200px;
            height: auto;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
echo $form->openForm(['class' => 'form', 'action' => 'index.php', 'method' => 'POST']);
echo $form->createElement('input', ['type' => 'text', 'placeholder' => 'name', 'name' => 'username', 'value' => $smartForm->saveName()]);
echo $form->createElement('input', ['type' => 'password', 'name' => 'userpass', 'placeholder' => 'password']);
echo $form->createElement('textarea', ['cols' => 19, 'rows' => 5, 'name' => 'text']) . $smartForm->saveText() . '</textarea><br>';
echo $form->createElement('input', ['type' => 'submit', 'value' => 'Post', 'name' => 'send']);
echo $form->closeForm();
echo '<br>Echo:' . $echo . '<br>' . 'Message from Flash class:<b>' . $echo1 . '</b>';
?>
<p>Счетчик посещений:<?php echo $cookie->getCookie('countVisits') + 1; ?></p>
</body>
</html>

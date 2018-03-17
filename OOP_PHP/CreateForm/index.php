<?php

require ('classSmartForm.php');
require ('classCookie.php');

if($cookie->getCookie('countVisits') != null){
    Cookie::$counter=$_COOKIE['countVisits']+1;
}else{
    Cookie::$counter++;
}
$cookie->setCookie('countVisits',Cookie::$counter,10);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .form{
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
echo $form->openForm(['class'=>'form','action'=>'index.php','method'=>'POST']);
echo $form->createElement('input',['type'=>'text','placeholder'=>'name','name'=>'username','value'=>$smartForm->saveName()]);
echo $form->createElement('input',['type'=>'password','name'=>'userpass','placeholder'=>'password']);
echo $form->createElement('textarea',['cols'=>19,'rows'=>5,'name'=>'text']).$smartForm->saveText().'</textarea><br>';
echo $form->createElement('input',['type'=>'submit','value'=>'Post','name'=>'send']);
echo $form->closeForm();
?>
<p>Счетчик посещений:<?php echo $cookie->getCookie('countVisits')+1; ?></p>
</body>
</html>

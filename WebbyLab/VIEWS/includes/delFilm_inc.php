<?php

if (isset($_POST['submitDelFilm'],$_POST['delFilmName']) && !empty($_POST['delFilmName'])){

    $delTitle = htmlspecialchars(trim($_POST['delFilmName'],' '));
    $checkTheTitle = $connection->query("SELECT title FROM Films WHERE title='$delTitle'");

    if ($checkTheTitle->fetch_assoc()!=null){
        $delRecord = $connection->query("DELETE FROM Films WHERE title='$delTitle'");
        unset($delTitle);
        echo '<script> alert("Film had been deleted")</script>';
        header('location:'.'/VIEWS/films.php');
    } else {
        echo '<script> alert("Such film does not exist!")</script>';
    }
}
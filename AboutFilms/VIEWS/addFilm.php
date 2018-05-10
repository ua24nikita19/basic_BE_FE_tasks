<?php
require './includes/addFilm_inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-store" />
    <title>TEST</title>
    <link rel="stylesheet" href="../CSS/stylesAddFilm.css">
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <main class="mainAdd">
        <form method="post" action="" class="addNewFilm">
            <div>
            <label for="title">Title</label>
                <input type="text" id="title" name="title">
            </div>
            <div>
            <label for="release">Release</label>
                <input type="date" id="release" min="1900-01-02" name="date_release">
            </div>
            <div>
            <label for="format">Format</label>
                <input type="text" name="format" id="format">
            </div>
            <div>
            <label for="actors" id="label-actors">Actors</label>
                <textarea id="actors" name="actors"></textarea>
            </div>
            <button type="submit">Add</button>
            <a href="films.php">Back</a>
        </form>
    </main>
</body>
</html>
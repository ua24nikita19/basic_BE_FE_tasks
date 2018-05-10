<?php
require './includes/allfilms_inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-store" />
    <title>TEST</title>
    <link rel="stylesheet" href="../CSS/stylesAllFilms.css">
</head>
<body>
<div class="wrapp">
    <div class="table">
        <div class="row">
            <div class="cell"><b>Title</b></div>
            <div class="cell"><b>Release</b></div>
            <div class="cell"><b>Format</b></div>
            <div class="cell"><b>Actors</b></div>
        </div>
        <?php while($getRecord = $records->fetch_assoc()): ?>
        <div class="row">
            <div class="cell"><?php echo $getRecord['title'] ?></div>
            <div class="cell"><?php echo $getRecord['date_release'] ?></div>
            <div class="cell"><?php echo $getRecord['format'] ?></div>
            <div class="cell"><?php echo $getRecord['stars'] ?></div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>

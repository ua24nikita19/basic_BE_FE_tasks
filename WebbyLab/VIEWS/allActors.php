<?php
require './includes/allactors_inc.php';
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
            <div class="cell"><b>Number</b></div>
            <div class="cell"><b>Actor</b></div>
        </div>
        <?php while($getRecord = $records->fetch_assoc()): static $i=1; ?>
            <div class="row">
                <div class="cell"><?php echo $i ?></div>
                <div class="cell"><?php echo $getRecord['Name'] ?></div>
            </div>
        <?php $i++; endwhile; ?>
    </div>
</div>
</body>
</html>

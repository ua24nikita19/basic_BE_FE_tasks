<?php
require './includes/findOneFilm.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-store" />
    <title>TEST</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <script src="../JS/event.js" defer></script>
</head>
<body style="padding-top: 70px;">
    <nav>
        <div class="small-navigation">
            <p>Menu</p>
        </div>
        <ul class="navigation">
            <li><a href="allActors.php">List of actors</a></li>
            <li><a href="allfilms.php">List of films</a></li>
            <li><a href="/VIEWS/addFilm.php">Add new film</a></li>
        </ul>
    </nav>

    <?php if (!isset($recordWithActor)): ?>
        <ul class="flex-container">
        <?php while ($row = $record->fetch_assoc()):?>
            <li class="flex-item">
                <ul class="flex-container-film">
                    <li class="flex-film"><b>Название: </b>"<?php echo $row['title'] ?>"</li>
                    <li class="flex-film"><b>Год выпуска: </b> <?php echo $row['date_release'] ?></li>
                    <li class="flex-film"><b>Формат: </b> <?php echo $row['format'] ?></li>
                    <li class="flex-film"><b>Список актеров: </b>
                        <?php echo $row['stars'] ?>
                    </li>
                    <li>
                        <div class="storyline"><b>Storyline</b>
                            <p>When Eddie Brock acquires the powers of a symbiote, he will have to release his alter-ego "Venom" to save his life.</p>
                        </div>
                    </li>
                    <div><img src="https://upload.wikimedia.org/wikipedia/ru/thumb/0/05/Venom_poster.jpg/197px-Venom_poster.jpg" alt=""></div>
                </ul>
            </li>
        <?php endwhile; ?>
        </ul>
    <?php endif; ?>

    <?php if (isset($recordWithActor)):?>
        <ul class="flex-container">
            <?php while ($row = $record->fetch_assoc()){
                if (!in_array($row['id'], $recordWithActor)) {continue;}
            ?>
            <li class="flex-item">
                <ul class="flex-container-film">
                    <li class="flex-film"><b>Название: </b>"<?php echo $row['title'] ?>"</li>
                    <li class="flex-film"><b>Год выпуска: </b> <?php echo $row['date_release'] ?></li>
                    <li class="flex-film"><b>Формат: </b> <?php echo $row['format'] ?></li>
                    <li class="flex-film"><b>Список актеров: </b>
                        <?php echo $row['stars'] ?>
                    </li>
                    <li>
                        <div class="storyline"><b>Storyline</b>
                            <p>When Eddie Brock acquires the powers of a symbiote, he will have to release his alter-ego "Venom" to save his life.</p>
                        </div>
                    </li>
                    <div><img src="https://upload.wikimedia.org/wikipedia/ru/thumb/0/05/Venom_poster.jpg/197px-Venom_poster.jpg" alt=""></div>
                </ul>
            </li>
            <?php } ?>
        </ul>
    <?php endif;?>
</body>
</html>

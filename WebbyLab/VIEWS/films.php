<?php
require './includes/films_inc.php';
require './includes/delFilm_inc.php';
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
<body>
<div class="modal_addFilm">
    <br>
    <form method="post" action="">
        <p>Write the title of film which you want to delete</p>
        <input type="text" name="delFilmName">
        <p class="modal_addFilm-p">Close</p>
        <button type="submit" name="submitDelFilm">Delete</button>
    </form>
</div>
    <nav>
        <div class="small-navigation">
            <p>Menu</p>
        </div>
        <ul class="navigation">
            <li><a href="allActors.php">List of actors</a></li>
            <li><a href="allfilms.php">List of films</a></li>
            <li><a href="import.php">Import</a></li>
            <li><a href="/VIEWS/addFilm.php">Add new film</a></li>
            <li><a href="" class="del_film">Delete film</a></li>
        </ul>
    </nav>

    <main>
        <form method="post" action="findOneFilm.php">
            <div class="search">
                    <input type="text" name="searchValue">
                    <div class="search-param">
                        <select name="searchParam">
                            <option value="title">Search by</option>
                            <option value="title">Name of film</option>
                            <option value="star">Name of actor</option>
                        </select>
                    </div>
                    <button type="submit">Find</button>
            </div>
        </form>
    </main>
        <ul class="flex-container">
            <?php  while ($row = $record->fetch_assoc()):?>
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
                            <div><img src="" alt=""></div>
                        </ul>
                </li>
            <?php endwhile; ?>
        </ul>
</body>
</html>
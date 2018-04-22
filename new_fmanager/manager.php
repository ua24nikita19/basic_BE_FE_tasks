<?php

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Файловый менеджер</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <meta http-equiv="Cache-Control" content="no-cache">
</head>
<body>
<?php
    require ('FilesActions.php');
?>
<header><h1>File manager</h1></header>
<section id="actions" class="action">
    <div class="action-NewFolder action-block">New Folder</div>
    <div class="action-Upload action-block">Upload</div>
    <div class="action-Delete action-block">Delete</div>
    <div class="action-Copy action-block">Copy</div>
    <div class="action-Past action-block">Past</div>
</section>
<article id="path">
    <b>Path:</b>
    <?php
        $itemsArr = $filesActions->itemsInDirectory();

        foreach ( $itemsArr as $item) {
            if (isset($_POST[$item])){
                $filesActions->setNextDir($item);
            }
        }

        echo $filesActions->basedir;
    ?>
</article>
<main id="content">
    <form action="" method="POST">
        <?php
            $filesActions->getContentsDirectory($filesActions->getCurrentDir());
        ?>
    </form>
</main>
<footer>
    Nikita Karpenko
</footer>
</body>
</html>
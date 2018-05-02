<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="modal.js" defer></script>
</head>
<body>
<style>
    body {
        width: 100%;
        height: 100%;
    }
    div#modal {
        background-color: rgba(0,0,0,0.3);
        width: 100%;
        height: 100%;
        overflow: auto;
        padding: 5% 15px;
        position: fixed;
        z-index: 99999999999999999999999999;
        left: 0;
        top: 0;
        display: none;
    }
    .modal-content {
        margin: 0 auto;
        width: 80%;
        padding: 5px;
        overflow: auto;
        background-color: antiquewhite;
    }

    .modal-main {
        width: 100%;
        height: 100%;
        background-color: white;
        padding: 10px;
        text-align: left;
    }
    .modal-main pre {
        color: black;
        font: inherit;
    }

    p {
        margin: 0;
    }

    .modal-title {
        width: 100%;
    }
    .modal-btn-add, .modal-btn-cancel {
        float: right;
        display: block;
        border: 1px solid maroon;
        width: 140px;
        height: 30px;
        background-color: transparent;
        outline-style: none;
        padding: 1px;
        color: black;
        margin: 5px 0 0 5px;
        border-radius: 3px;
    }
    .modal-btn-add:hover {
        color: inherit;
        cursor: pointer;
        background-color: green;
    }

    .modal-btn-cancel:hover {
        color: inherit;
        cursor: pointer;
        background-color: #f33155;
    }
    pre {
        color: black;
    }
</style>
<?php  echo $content; ?>
</body>
</html>
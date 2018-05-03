<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="modal.js" defer></script>
</head>
<body>
<style>
    body {
        width: 100%;
        height: 100%;
    }
    table th a, .t{
        color: black !important;
    }
    table td {
        word-wrap: break-word;

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
    #addtask {
        width: 350px;
        text-align: center !important;
        margin: 0 auto;
    }
    #addtask > div, input {
        margin: 0 auto;
    }
    input[type='file']{
        margin: 10px auto;
    }
    .btn-status {
        display: block;
        border: 1px solid maroon;
        width: 140px;
        height: 30px;
        background-color: transparent;
        outline-style: none;
        padding: 1px;
        color: black;
        margin: 0 auto;
        float: left;
    }
    .btn-status:hover {
        color: inherit;
        cursor: pointer;
        background-color: #f33155;
    }
    table td {
        font-family: SansSerif, "DejaVu Sans";
        font-size: 1rem;
        font-weight: bold;
        margin-top: 10px;
        text-align: left;
        max-width: 150px;
    }
    .btn-exit:hover, .btn-login:hover {
        color: inherit;
        text-decoration: none;
        cursor: pointer;
        background-color: #f33155;
    }
    .btn-exit, .btn-login {
        display: block;
        border: 1px solid maroon;
        width: 70px;
        height: 30px;
        background-color: transparent;
        float: left;
        margin-right: 5px;
        outline-style: none;
        padding: 1px;
        color: black;
    }
    body {
        padding: 25px;
        text-align: center;
    }
    .btn-outline-warning {
        margin-bottom: 20px;"
    }
    .btn-outline-success {
        margin: 5px;
    }

    .table.table-sm.table-dark td, th {
        padding: 15px;
    }

    table a, .t {
        color: white;
        text-underline: none;
    }
    table a:visited, a:hover {
        color: white;
    }
    #register {
        margin: 0 auto;
        width: 350px;!important;
    }
    .admin {
        float: right;
        font-weight: bold;
        font-family: SansSerif, "DejaVu Sans";
    }

    .btn-addd {
        display: block;
        border: 1px solid maroon;
        width: 140px;
        height: 30px;
        background-color: transparent;
        outline-style: none;
        padding: 1px;
        color: black;
        margin: 0 auto;
    }

    .btn-addd:hover {
        color: inherit;
        cursor: pointer;
        background-color: #f33155;
    }

    .btn-addd, .btn-exit, .btn-login, .btn-status {
        margin-bottom: 10px;
    }
    .edit_form {
        width: 350px;
        text-align: center;
        margin: 0 auto;
    }
    .edit_form div {
        margin: 0 auto;
    }

</style>
<?php  echo $content; ?>
</body>
</html>
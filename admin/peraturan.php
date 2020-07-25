<?php
include "config.php";
if (!isset($_SESSION['admin'])) {
    echo "<script>window.location='" . base_url() . "';</script>";
} else { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://kit.fontawesome.com/659604d02a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Quiz CSO 2019</title>
        <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    </head>

    <body style="background-image: url('img/bg.png');" oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;'>
        <?php include "_include/navbar.php"; ?>
        <div class="container">
            <?php include "_include/content_peraturan.php"; ?>
        </div>
        <?php include "_include/addon.php" ?>
        <?php include "js/addjs.php" ?>
    </body>

    </html>
<?php } ?>
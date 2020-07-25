<?php include "config.php"; ?>
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

<body style="background-image: url('img/bg.png');">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
        </ul>
    </nav>
    <!-- End of Topbar -->

    <div class="container">
        <div class="row">
            <div class="col" style="background-color:white; padding:50px 150px; margin-bottom:40px;">
                <div class="text-center" style="margin:70px;">
                    <p style="font-size:50px;">QUIZ SUDAH SELESAI</p>
                    <p>Soal yang telah anda kerjakan akan dikoreksi oleh admin.</p>
                    <div style="margin:75px;"></div>
                    <a href="<?= base_url() ?>" style="color:red; font-size: 20px;">&larr; HOME</a>
                </div>
            </div>
        </div>
    </div>
    <?php include "_include/addon.php" ?>
    <?php include "js/addjs.php" ?>
</body>

</html>
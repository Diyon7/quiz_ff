<?php
include "config.php";
if (!isset($_SESSION['peserta'])) {
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

    <body style="background-image: url('img/bg.png');">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['peserta'] ?></span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url() ?>/countdown.php">
                            Countdown
                        </a>
                        <a class="dropdown-item" href="<?= base_url() ?>/rules.php">
                            Peraturan
                        </a>
                        <hr>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col" style="background-color:white; padding:50px 150px; margin-bottom:40px;">
                    <h1 style="text-align:center; padding-bottom:30px;">PERATURAN!</h1>
                    <ol style="text-align:justify;">
                        <?php
                            $sql_mhs = mysqli_query($con, "SELECT * FROM list_peraturan") or die(mysqli_error($con, ""));
                            if (mysqli_num_rows($sql_mhs) > 0) {
                                while ($data = mysqli_fetch_array($sql_mhs)) { ?>
                                <li style="padding-bottom:10px; color:black"><?= $data['peraturan'] ?></li>
                        <?php };
                            } ?>
                    </ol>
                </div>
            </div>
        </div>
        <?php include "_include/addon.php" ?>
        <?php include "js/addjs.php" ?>
    </body>

    </html>
<?php } ?>
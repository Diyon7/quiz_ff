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

    <body style="background-image: url('img/bg.png');">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <p id="countdown" style="margin:50px;"></p>
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
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['admin'] ?></span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url() ?>">
                            Dashboard
                        </a>
                        <a class="dropdown-item" href="<?= base_url() ?>/hasil.php">
                            Hasil Peserta
                        </a>
                        <hr>
                        <a class="dropdown-item" href="<?= base_url() ?>/peraturan.php">
                            Peraturan
                        </a>
                        <a class="dropdown-item" href="<?= base_url() ?>/result.php">
                            Selesai
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
        <!-- End of Topbar -->

        <div class="container">
            <div class="row">
                <div class="col" style="background-color:white; padding:50px 150px; margin-bottom:40px;">
                    <div class="text-center" style="margin:70px;">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                        <p class="text-gray-500 mb-0">Jika anda sampai pada page ini, berarti ada yang salah dengan waktu anda. <br><b>SEGERA UBAH WAKTU ANDA ATAU KAMI TIDAK SEGAN-SEGAN MENGURANGI POINT ANDA!</b></p>

                        <div style="margin:75px;"></div>
                        <a href="<?= base_url() ?>/_auth/logout.php" style="color:red; font-size: 20px;">&larr; LOG OFF</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include "_include/addon.php" ?>
        <?php include "js/addjs.php" ?>
    </body>

    </html>
<?php } ?>
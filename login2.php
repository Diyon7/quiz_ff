<?php
include "config.php";
if (isset($_SESSION['peserta'])) {
    echo "<script>window.location='" . base_url() . "';</script>";
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login</title>
        <script src="https://kit.fontawesome.com/659604d02a.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">
    </head>

    <body style="background-image: url('<?= base_url() ?>/img/bg.png');">
        <div style="padding:30px;"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-content">
                                        <img src="<?= base_url() ?>/img/header-cso1.png" class="logo">
                                        <div style="text-align:center">
                                            UPN "Veteran" Jawa Timur
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">LOGIN PESERTA</h1>
                                        </div>
                                        <form action="" method="post" class="user">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email..." required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="pass" class="form-control form-control-user" placeholder="Password" required>
                                            </div>
                                            <input type="submit" name="login" class="btn btn-primary btn-user btn-block" value="Login">
                                            <hr>
                                            Gunakan email dan password PESERTA yang sudah anda daftarkan di website <a href="http://fasilkomfest.com/">www.fasilkomfest.com</a> <br>
                                            Apabila anda tidak bisa login, silahkan hubungi nomor berikut <b>Jafni: (+62 812-3575-2391)</b>
                                            <?php if (isset($_POST['login'])) {
                                                    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
                                                    $pass = md5(trim(mysqli_real_escape_string($con, $_POST['pass'])));

                                                    $sql_cek = mysqli_query($con, "SELECT * FROM teams_csos WHERE email = '$email' AND password = '$pass'");
                                                    if (mysqli_num_rows($sql_cek) > 0) {
                                                        while ($cek = mysqli_fetch_array($sql_cek)) {
                                                            if ($cek['email'] == $email && $cek['password'] == $pass) {
                                                                if ($cek['login'] == 1) {
                                                                    echo '<div class="alert alert-danger alert-dismissible"><strong>Anda sudah login!</strong></div>';
                                                                } else {
                                                                    $_SESSION['peserta'] = $email;
                                                                    echo "<script>window.location='" . base_url() . "';</script>";
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        echo '<div class="alert alert-danger alert-dismissible"><strong>login gagal!</strong></div>';
                                                    }
                                                } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "js/addjs.php" ?>
    </body>

    </html>
<?php } ?>
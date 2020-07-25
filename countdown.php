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
        <!-- Topbar -->
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
        <!-- End of Topbar -->

        <div class="container">
            <div class="row">
                <div class="col" style="background-color: rgba(255, 255, 255, 0.5); padding:25px 50px; margin-bottom:20px;">
                    <div class="text-center" style="padding:25px;">
                        <div class="row justify-content-md-center">
                            <div class="col">
                                <label for="countdown" style="font-size:70px; font-weight: bold; color:white">C O U N T D O W N</label>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-md-center" style="margin-bottom:25px;">
                                <div class="col-3">
                                    <p id="days" style="text-align:center; font-size:90px; font-weight: bold; background-color:white; margin:5px;"></p>
                                    <p style="text-align:center; background-color:white; margin:5px;">Days</p>
                                </div>
                                <div class="col-3">
                                    <p id="hours" style="text-align:center; font-size:90px; font-weight: bold; background-color:white; margin:5px;"></p>
                                    <p style="text-align:center; background-color:white; margin:5px;">Hours</p>
                                </div>
                                <div class="col-3">
                                    <p id="minutes" style="text-align:center; font-size:90px; font-weight: bold; background-color:white; margin:5px;"></p>
                                    <p style="text-align:center; background-color:white; margin:5px;">minutes</p>
                                </div>
                                <div class="col-3">
                                    <p id="seconds" style="text-align:center; font-size:90px; font-weight: bold; background-color:white; margin:5px;"></p>
                                    <p style="text-align:center; background-color:white; margin:5px;">Seconds</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" style="background-color: rgba(255, 255, 255, 0.5); padding:20px; margin-bottom:20px; text-align:center">
                    <a href="<?= base_url() ?>/rules.php" style="font-size:30px; color:white; font-weight:bold;">P E R A T U R A N</a>
                </div>
            </div>

            <?php include "_include/addon.php" ?>
            <?php include "js/addjs.php" ?>

            <?php $sql_settings = mysqli_query($con, "SELECT * FROM quiz_settings");
                while ($settings = mysqli_fetch_array($sql_settings)) {
                    $time_start = $settings['time_start'];
                    $time_stop = $settings['time_stop'];

                    $toogle_quiz = $settings['toogle_quiz'];
                };
                if ($time_start != null || $time_stop != null) {
                    $date_start1 = explode('/', $time_start);
                    $date_start2 = explode(' ', $date_start1[2]);
                    $date_start3 = explode(':', $date_start2[1]);
                    if ($date_start2[2] == 'PM' && $date_start3[0] != 12) {
                        $date_start3[0] = $date_start3[0] + 12;
                    }
                    $date_start = "$date_start1[0] $date_start1[1], $date_start2[0] $date_start3[0]:$date_start3[1]:00";

                    $date_countdown1 = explode('/', $time_stop);
                    $date_countdown2 = explode(' ', $date_countdown1[2]);
                    $date_countdown3 = explode(':', $date_countdown2[1]);
                    if ($date_countdown2[2] == 'PM' && $date_countdown3[0] != 12) {
                        $date_countdown3[0] = $date_countdown3[0] + 12;
                    }
                    $time_countdown = "$date_countdown1[0] $date_countdown1[1], $date_countdown2[0] $date_countdown3[0]:$date_countdown3[1]:00";
                }  ?>

            <script>
                // Set the date we're counting down to
                var countDownDate = new Date("<?= $time_countdown ?>").getTime();
                var datestart = new Date("<?= $date_start ?>").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;
                    var range = datestart - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(range / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((range % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((range % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((range % (1000 * 60)) / 1000);

                    // Output the result in an element with id="demo"
                    if (range > 0) {
                        document.getElementById("days").innerHTML = days;
                        document.getElementById("hours").innerHTML = hours;
                        document.getElementById("minutes").innerHTML = minutes;
                        document.getElementById("seconds").innerHTML = seconds;
                    } else if (<?= $toogle_quiz ?> == 0) {
                        window.location = '<?= base_url() ?>/error.php';
                    } else if (distance > 0) {
                        window.location = '<?= base_url() ?>/peraturan.php';
                    } else if (distance <= 0) {
                        window.location = '<?= base_url() ?>/final.php';
                    }
                }, 1000);
            </script>
    </body>

    </html>
<?php } ?>
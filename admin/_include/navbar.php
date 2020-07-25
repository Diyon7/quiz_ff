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
                <a class="dropdown-item" href="<?= base_url() ?>/Settings.php">
                    Settings
                </a>
                <hr>
                <a class="dropdown-item" href="<?= base_url() ?>/before.php">
                    Countdown
                </a>
                <a class="dropdown-item" href="<?= base_url() ?>/peraturan.php">
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
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        if (range > 0) {
            document.getElementById("countdown").innerHTML = "SOAL BELUM TERBUKA";
        } else if (<?= $toogle_quiz ?> == 0) {
            document.getElementById("countdown").innerHTML = "SOAL DITUTUP";
        } else if (distance > 0) {
            document.getElementById("countdown").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";
        } else if (distance <= 0 || <?= $toogle_quiz ?> == 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "SUDAH SELESAI";
        }

    }, 1000);
</script>
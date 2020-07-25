<?php
include "config.php";
if (isset($_SESSION['peserta'])) {
    echo "<script>window.location='" . base_url() . "/countdown.php';</script>";
} else {
    echo "<script>window.location='" . base_url() . "/login.php';</script>";
}

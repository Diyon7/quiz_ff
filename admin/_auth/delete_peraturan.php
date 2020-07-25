<?php
include "../config.php";

mysqli_query($con, "DELETE FROM list_peraturan WHERE id = '$_GET[id]'") or die(mysqli_error($con));

echo "<script>window.location='" . base_url() . "/settings.php';</script>";

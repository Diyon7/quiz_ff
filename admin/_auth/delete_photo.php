<?php
$sql_add = mysqli_query($con, "UPDATE quiz_csos SET image='' WHERE id = '$_GET[id]'");

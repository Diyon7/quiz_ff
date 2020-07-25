<?php
$photo = trim(mysqli_real_escape_string($con, $_FILES['photo']['name']));
$error = trim(mysqli_real_escape_string($con, $_FILES['photo']['error']));
$tmpphoto = trim(mysqli_real_escape_string($con, $_FILES['photo']['tmp_name']));
$photosize = trim(mysqli_real_escape_string($con, $_FILES['photo']['size']));

$extphotovalid = ['jpg', 'jpeg', 'png'];
$extphoto = explode('.', $photo);
$extphoto = strtolower(end($extphoto));

$question = trim(mysqli_real_escape_string($con, $_POST['soal']));
$pil1 = trim(mysqli_real_escape_string($con, $_POST['pil1']));
$pil2 = trim(mysqli_real_escape_string($con, $_POST['pil2']));
$pil3 = trim(mysqli_real_escape_string($con, $_POST['pil3']));
$pil4 = trim(mysqli_real_escape_string($con, $_POST['pil4']));
$pil5 = trim(mysqli_real_escape_string($con, $_POST['pil5']));
$answer = trim(mysqli_real_escape_string($con, $_POST['answer']));

if ($error != 4) {
    $photo = uniqid() . '.' . $extphoto;

    move_uploaded_file($_FILES['photo']['tmp_name'], 'img/kuis/' . $photo);
    $sql_add = mysqli_query($con, "UPDATE quiz_csos SET image='$photo' WHERE id = '$_GET[id]'");
}
if ($question != null) {
    $sql_add = mysqli_query($con, "UPDATE quiz_csos SET question='$question' WHERE id = '$_GET[id]'");
}
if ($pil1 != null) {
    $sql_add = mysqli_query($con, "UPDATE quiz_csos SET multiple_choice_1='$pil1' WHERE id = '$_GET[id]'");
}
if ($pil2 != null) {
    $sql_add = mysqli_query($con, "UPDATE quiz_csos SET multiple_choice_2='$pil2' WHERE id = '$_GET[id]'");
}
if ($pil3 != null) {
    $sql_add = mysqli_query($con, "UPDATE quiz_csos SET multiple_choice_3='$pil3' WHERE id = '$_GET[id]'");
}
if ($pil4 != null) {
    $sql_add = mysqli_query($con, "UPDATE quiz_csos SET multiple_choice_4='$pil4' WHERE id = '$_GET[id]'");
}
if ($pil5 != null) {
    $sql_add = mysqli_query($con, "UPDATE quiz_csos SET multiple_choice_5='$pil5' WHERE id = '$_GET[id]'");
}
if ($answer != null) {
    $sql_add = mysqli_query($con, "UPDATE quiz_csos SET answer_key='$answer' WHERE id = '$_GET[id]'");
}

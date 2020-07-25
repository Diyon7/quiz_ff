<?php
$photo = trim(mysqli_real_escape_string($con, $_FILES['photo']['name']));
$error = trim(mysqli_real_escape_string($con, $_FILES['photo']['error']));
$tmpphoto = trim(mysqli_real_escape_string($con, $_FILES['photo']['tmp_name']));
$photosize = trim(mysqli_real_escape_string($con, $_FILES['photo']['size']));

$extphotovalid = ['jpg', 'jpeg', 'png'];
$extphoto = explode('.', $photo);
$extphoto = strtolower(end($extphoto));

$question = trim(mysqli_real_escape_string($con, $_POST['id']));
$question = trim(mysqli_real_escape_string($con, $_POST['soal']));
$pil1 = trim(mysqli_real_escape_string($con, $_POST['pil1']));
$pil2 = trim(mysqli_real_escape_string($con, $_POST['pil2']));
$pil3 = trim(mysqli_real_escape_string($con, $_POST['pil3']));
$pil4 = trim(mysqli_real_escape_string($con, $_POST['pil4']));
$pil5 = trim(mysqli_real_escape_string($con, $_POST['pil5']));
$answer = trim(mysqli_real_escape_string($con, $_POST['answer']));

date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s');

if ($error == 4) {
    $sql_add = mysqli_query($con, "INSERT INTO quiz_csos (id, question, multiple_choice_1, multiple_choice_2, multiple_choice_3, multiple_choice_4, multiple_choice_5, answer_key) VALUES ('$id','$question','$pil1','$pil2','$pil3','$pil4','$pil5','$answer')");
} else {
    $photo = uniqid() . '.' . $extphoto;

    move_uploaded_file($_FILES['photo']['tmp_name'], 'img/kuis/' . $photo);
    $sql_add = mysqli_query($con, "INSERT INTO quiz_csos (question, image, multiple_choice_1, multiple_choice_2, multiple_choice_3, multiple_choice_4, multiple_choice_5, answer_key, created_at) VALUES ('$question','$photo','$pil1','$pil2','$pil3','$pil4','$pil5','$answer', '$date')");
}

<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    $sql_quiz = mysqli_query($con, "SELECT * FROM quiz_csos");
    while ($quiz = mysqli_fetch_array($sql_quiz)) {
        if ($quiz['image'] != null) { ?>
            <img src="<?= base_url() ?>/img/kuis/<?= $quiz['image'] ?>" alt="" width="300" style="display: block; margin-left: auto; margin-right: auto;">
        <?php }; ?>
        <p><?= $quiz['id'] ?>. <?= $quiz['question'] ?></p>
        (A) <?= $quiz['multiple_choice_1'] ?><br>
        (B) <?= $quiz['multiple_choice_2'] ?><br>
        (C) <?= $quiz['multiple_choice_3'] ?><br>
        (D) <?= $quiz['multiple_choice_4'] ?><br>
        (E) <?= $quiz['multiple_choice_5'] ?><br>
        <p>Jawaban yang benar adalah = <b><?= $quiz['answer_key'] ?></b></p>
        <br><br>
    <?php } ?>
</body>

</html>
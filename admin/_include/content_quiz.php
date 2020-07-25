<?php
$size_page = 1;
$much_data = mysqli_num_rows(mysqli_query($con, "SELECT * FROM quiz_csos"));
$much_page = ceil($much_data / $size_page);
$active_page = (isset($_GET["page"])) ? $_GET["page"] : 1;
$start_page = ($size_page * $active_page) - $size_page;

// team id
$sql_search = mysqli_query($con, "SELECT id, email FROM admins");
while ($search = mysqli_fetch_array($sql_search)) {
    if ($search['email'] == $_SESSION['admin']) {
        $teamid = $search['id'];
    };
};

$sql_quiz = mysqli_query($con, "SELECT * FROM quiz_csos WHERE id='$active_page'") or die(mysqli_error($con, ""));
while ($data = mysqli_fetch_array($sql_quiz)) { ?>

    <div class="row kotak">
        <div class="col-8 kotak_kiri">
            <div class="kotak_soal">
                <div style="padding:0.1px;"></div>
                <?php if ($data['image'] != null) { ?>
                    <img src="<?= base_url() ?>/img/kuis/<?= $data['image'] ?>" alt="" width="300">
                <?php }; ?>
                <div class="soal">
                    <p><?= $data['question'] ?></p>
                    <ul>
                        <li>(A) <?= $data['multiple_choice_1'] ?></li>
                        <li>(B) <?= $data['multiple_choice_2'] ?></li>
                        <li>(C) <?= $data['multiple_choice_3'] ?></li>
                        <li>(D) <?= $data['multiple_choice_4'] ?></li>
                        <li>(E) <?= $data['multiple_choice_5'] ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col kotak_jawaban">
            <h5>Daftar Soal</h5>
            <div class="overflow-auto page_soal">
                <?php
                    $sql_cari = mysqli_query($con, "SELECT quiz_csos.id, answer_cso_teams.team_id, answer_cso_teams.answer_key FROM quiz_csos LEFT JOIN answer_cso_teams ON quiz_csos.id=answer_cso_teams.quiz_cso_id AND answer_cso_teams.team_id=$teamid ORDER BY quiz_csos.id") or die(mysqli_error($con, ""));
                    while ($data = mysqli_fetch_array($sql_cari)) {
                        if ($data['id'] == $active_page) {
                            $answer_key = $data['answer_key']; ?>
                        <a href="" style="background-color:gray; display: block; color: black; padding: 5px; text-decoration: none;" id="quiz_now"><?= $data['id'] ?></a>
                    <?php } else if ($data['answer_key'] != null) { ?>
                        <a href="?page=<?= $data['id'] ?>" class="done"><?= $data['id'] ?></a>
                    <?php } else { ?>
                        <a href="?page=<?= $data['id'] ?>" class="nodone"><?= $data['id'] ?></a>
                <?php };
                    }; ?>
            </div>

            <form action="" method="post">
                <div class="container">
                    <div class="row">
                        <ul class="pilihan">
                            <li>
                                <input type="radio" id="a" name="pil" value="A" <?php if ($answer_key == 'A') {
                                                                                        echo "checked";
                                                                                    } ?>>
                                <label for="a">A</label>
                            </li>
                            <li>
                                <input type="radio" id="b" name="pil" value="B" <?php if ($answer_key == 'B') {
                                                                                        echo "checked";
                                                                                    } ?>>
                                <label for="b">B</label>
                            </li>
                            <li>
                                <input type="radio" id="c" name="pil" value="C" <?php if ($answer_key == 'C') {
                                                                                        echo "checked";
                                                                                    } ?>>
                                <label for="c">C</label>
                            </li>
                            <li>
                                <input type="radio" id="d" name="pil" value="D" <?php if ($answer_key == 'D') {
                                                                                        echo "checked";
                                                                                    } ?>>
                                <label for="d">D</label>
                            </li>
                            <li>
                                <input type="radio" id="e" name="pil" value="E" <?php if ($answer_key == 'E') {
                                                                                        echo "checked";
                                                                                    } ?>>
                                <label for="e">E</label>
                            </li>
                        </ul>

                        <div class="col-5">
                            <br> <br>
                            <input type="submit" name="answer" class="btn btn-light" style="width: 100%; margin-bottom:5px;" value="PILIH"><br>
                            <a href="<?= base_url() ?>/result.php" class="btn btn-primary" style="width: 100%;">SELESAI</a>
                        </div>

                        <div class="col navi">
                            <?php if ($active_page > 1) { ?>
                                <a href="?page=<?= $active_page - 1 ?>"><i class="fas fa-arrow-circle-left"></i></a>
                            <?php } ?>
                            <a href="?page=<?= $active_page ?>"><?= $active_page ?></a>

                            <?php if ($active_page < $much_page) { ?>
                                <a href="?page=<?= $active_page + 1 ?>"><i class="fas fa-arrow-circle-right"></i></a>
                            <?php }; ?>
                        </div>
                    </div>
                </div>
            </form>
            <?php if (isset($_POST['answer'])) {
                    if (($_POST['pil']) == null) {
                        echo "<script>alert('Jawaban belum terisi');</script>";
                        echo "<script>window.location='" . base_url() . "/quiz.php?page=" . $active_page . "';</script>";
                    } else {
                        $pil = trim(mysqli_real_escape_string($con, $_POST['pil']));

                        // quiz cso id
                        $sql_search = mysqli_query($con, "SELECT id, answer_key FROM quiz_csos");
                        while ($search = mysqli_fetch_array($sql_search)) {
                            if ($search['id'] == $active_page) {
                                $quizcsoid = $search['id'];
                                $rightanswer = $search['answer_key'];
                            };
                        };
                        $answer = $_POST['pil'];
                        $sql_cek = mysqli_query($con, "SELECT * FROM answer_cso_teams WHERE team_id='$teamid' AND quiz_cso_id='$quizcsoid'") or die(mysqli_error($con, ""));
                        if (mysqli_num_rows($sql_cek) > 0) {
                            mysqli_query($con, "UPDATE answer_cso_teams SET answer_key='$answer' WHERE team_id='$teamid' AND quiz_cso_id='$quizcsoid'") or die(mysqli_error($con, ""));
                        } else {
                            mysqli_query($con, "INSERT INTO answer_cso_teams (team_id, quiz_cso_id, answer_key, right_answer) VALUES ('$teamid','$quizcsoid','$answer','$rightanswer')");
                        }
                    }
                    if ($active_page == $much_page) {
                        echo "<script>window.location='" . base_url() . "/result.php?id=$teamid';</script>";
                    } ?>
                <script>
                    window.location = '<?= base_url() ?>/quiz.php?page=<?= $active_page + 1 ?>';
                </script>
            <?php } ?>
        </div>
    </div>
<?php }; ?>
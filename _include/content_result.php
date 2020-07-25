<div class="row" style="background-color:white;">
    <div class="col">
        <h1 style="text-align:center; margin-top:30px;">Soal yang sudah anda kerjakan</h1>
        <br>
    </div>
</div>


<?php $sql_search = mysqli_query($con, "SELECT id, email FROM teams_csos");
while ($search = mysqli_fetch_array($sql_search)) {
    if ($search['email'] == $_SESSION['peserta']) {
        $teamid = $search['id'];
    };
};

$size_page = 1;
$much_data = mysqli_num_rows(mysqli_query($con, "SELECT * FROM quiz_csos"));
$much_page = ceil($much_data / $size_page);
$bagi = ceil($much_data / 3);
$batas = 0;

for ($a = 1; $a <= 12; $a++) { ?>
    <div class="row" style="background-color:white; padding:0 100px;">
        <?php $sql_cari = mysqli_query($con, "SELECT quiz_csos.id, answer_cso_teams.team_id, answer_cso_teams.answer_key FROM quiz_csos LEFT JOIN answer_cso_teams ON quiz_csos.id=answer_cso_teams.quiz_cso_id AND answer_cso_teams.team_id=$teamid ORDER BY quiz_csos.id LIMIT $batas, 10") or die(mysqli_error($con, ""));
            $batas = $batas + 10;
            while ($data = mysqli_fetch_array($sql_cari)) { ?>
            <div class="col navi" style="font-size: 24px; border: 0.5px solid; padding: 1px; margin:5px;">
                <?php if ($data['answer_key'] != null) { ?>
                    <a href="<?= base_url() ?>/quiz.php?page=<?= $data['id'] ?>" class="done"><?= $data['id'] ?></a>
                <?php } else { ?>
                    <a href="<?= base_url() ?>/quiz.php?page=<?= $data['id'] ?>" class="nodone" style="color:black;"><?= $data['id'] ?></a>
                <?php }; ?>
            </div>
        <?php }; ?>
    </div>
<?php }; ?>
<div class="row" style="background-color:white; padding:30px; padding-bottom:30px; padding-left:65%;">
    <a href="<?= base_url() ?>/quiz.php?page=1" class="btn btn-secondary">KEMBALI KE SOAL</a>
    <form action="" method="post">
        <input type="submit" name="done" class="btn btn-primary" value="KUMPULKAN JAWABAN">
    </form>
</div>
<div style="padding:30px;"></div>

<?php if (isset($_POST['done'])) {
    unset($_SESSION['peserta']);
    echo "<script>window.location='" . base_url() . "/final.php';</script>";
} ?>
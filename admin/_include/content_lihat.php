<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Peserta</h1>
    <p class="mb-4">
        <?php
        $get_id = $_GET['id'];
        $sql_team = mysqli_query($con, "SELECT * FROM teams WHERE id='$get_id'") or die(mysqli_error($con, ""));
        while ($team = mysqli_fetch_array($sql_team)) { ?>
            Team email : <?= $team['email'] ?><br>
            Team name : <?= $team['name'] ?><br>
            School Name : <?= $team['school_name'] ?><br>
        <?php }; ?>
    </p>
    <div class="container">
        <div class="row">
            <?php
            $sql_peserta = mysqli_query($con, "SELECT * FROM members WHERE team_id='$get_id'") or die(mysqli_error($con, ""));
            while ($peserta = mysqli_fetch_array($sql_peserta)) { ?>
                <div class="col">
                    <ul>
                        <li>Full Name = <?= $peserta['full_name'] ?></li>
                        <li>No. Phone = <?= $peserta['handphone'] ?></li>
                        <li>Line ID = <a href="http://line.me/ti/p/~@<?= $peserta['line'] ?>"><?= $peserta['line'] ?></a> </li>
                    </ul>
                </div>
            <?php }; ?>
        </div>
        <div class="row">
            <div class="col">
                <p>
                    <?php $sql_count = mysqli_query($con, "SELECT COUNT(*) FROM answer_cso_teams JOIN quiz_csos ON quiz_csos.id=answer_cso_teams.quiz_cso_id AND answer_cso_teams.team_id='$get_id' AND answer_cso_teams.answer_key=quiz_csos.answer_key ORDER BY answer_cso_teams.quiz_cso_id") or die(mysqli_error($con, ""));
                    $count = mysqli_fetch_array($sql_count, MYSQLI_NUM);
                    $benar = $count[0];
                    ?>
                    Jawaban Benar = <?= $benar ?><br>
                    <?php $sql_count = mysqli_query($con, "SELECT COUNT(*) FROM answer_cso_teams JOIN quiz_csos ON quiz_csos.id=answer_cso_teams.quiz_cso_id AND answer_cso_teams.team_id='$get_id' AND answer_cso_teams.answer_key!=quiz_csos.answer_key ORDER BY answer_cso_teams.quiz_cso_id") or die(mysqli_error($con, ""));
                    $count = mysqli_fetch_array($sql_count, MYSQLI_NUM);
                    $salah = $count[0];
                    ?>
                    Jawaban Salah = <?= $salah ?><br>
                    <?php $sql_count = mysqli_query($con, "SELECT COUNT(*) FROM answer_cso_teams JOIN quiz_csos ON quiz_csos.id=answer_cso_teams.quiz_cso_id AND answer_cso_teams.team_id='$get_id' ORDER BY answer_cso_teams.quiz_cso_id") or die(mysqli_error($con, ""));
                    $count = mysqli_fetch_array($sql_count, MYSQLI_NUM);
                    $much_data = mysqli_num_rows(mysqli_query($con, "SELECT * FROM quiz_csos"));
                    $kosong = $much_data - $count[0];
                    ?>
                    Jawaban Kosong = <?= $kosong ?><br>
                    <?php $total = ($benar * 4) - ($salah) ?>
                    Total Nilai = <?= $total ?><br>
                </p>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Soal</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Quiz CSO ID</th>
                            <th>Team ID</th>
                            <th>Answer</th>
                            <th>Right Answer</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Quiz CSO ID</th>
                            <th>Team ID</th>
                            <th>Answer</th>
                            <th>Right Answer</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $sql_lihat = mysqli_query($con, "SELECT answer_cso_teams.quiz_cso_id, answer_cso_teams.team_id, answer_cso_teams.answer_key, quiz_csos.answer_key FROM answer_cso_teams RIGHT JOIN quiz_csos ON quiz_csos.id=answer_cso_teams.quiz_cso_id AND answer_cso_teams.team_id='$get_id' ORDER BY answer_cso_teams.quiz_cso_id") or die(mysqli_error($con, ""));
                        while ($data = mysqli_fetch_array($sql_lihat)) {
                            if (strtolower($data[2]) != strtolower($data[3])) { ?>
                                <tr style="background-color:pink;">
                                <?php } ?>
                                <td><?= $data[0] ?></td>
                                <td><?= $data[1] ?></td>
                                <td><?= $data[2] ?></td>
                                <td><?= $data[3] ?></td>
                                </tr>
                            <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
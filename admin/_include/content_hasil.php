<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Peserta pengerjaan soal</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Team ID</th>
                        <th>Team Name</th>
                        <th>School Name</th>
                        <th>Email</th>
                        <th>Nilai</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Team ID</th>
                        <th>Team Name</th>
                        <th>School Name</th>
                        <th>Email</th>
                        <th>Nilai</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php
                    $sql_team_progress = mysqli_query($con, "SELECT DISTINCT teams.id, teams.name, teams.school_name, teams.email
                    FROM teams
                    INNER JOIN answer_cso_teams ON teams.id=answer_cso_teams.team_id;") or die(mysqli_error($con, ""));
                    if (mysqli_num_rows($sql_team_progress) > 0) {
                        while ($data = mysqli_fetch_array($sql_team_progress)) { ?>
                            <tr>
                                <td><?= $data['id'] ?></td>
                                <td><?= $data['name'] ?></td>
                                <td><?= $data['school_name'] ?></td>
                                <td><?= $data['email'] ?></td>
                                <?php
                                        $data_id = $data['id'];
                                        $benar = 0;
                                        $salah = 0;
                                        $sql_nilai = mysqli_query($con, "SELECT answer_cso_teams.team_id, answer_cso_teams.quiz_cso_id, answer_cso_teams.answer_key,quiz_csos.answer_key FROM answer_cso_teams JOIN quiz_csos ON quiz_csos.id=answer_cso_teams.quiz_cso_id AND answer_cso_teams.team_id=$data_id") or die(mysqli_error($con, ""));
                                        while ($nilai = mysqli_fetch_array($sql_nilai, MYSQLI_NUM)) {
                                            $sql_count = mysqli_query($con, "SELECT COUNT(*) FROM answer_cso_teams JOIN quiz_csos ON quiz_csos.id=answer_cso_teams.quiz_cso_id AND answer_cso_teams.team_id='$data_id' AND answer_cso_teams.answer_key=quiz_csos.answer_key ORDER BY answer_cso_teams.quiz_cso_id") or die(mysqli_error($con, ""));
                                            $count = mysqli_fetch_array($sql_count, MYSQLI_NUM);
                                            $benar = $count[0];
                                            $sql_count = mysqli_query($con, "SELECT COUNT(*) FROM answer_cso_teams JOIN quiz_csos ON quiz_csos.id=answer_cso_teams.quiz_cso_id AND answer_cso_teams.team_id='$data_id' AND answer_cso_teams.answer_key!=quiz_csos.answer_key ORDER BY answer_cso_teams.quiz_cso_id") or die(mysqli_error($con, ""));
                                            $count = mysqli_fetch_array($sql_count, MYSQLI_NUM);
                                            $salah = $count[0];
                                        } ?>
                                <td><?= ($benar * 4) - $salah ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>/lihat.php?id=<?= $data['id'] ?>" class="btn btn-warning">Lihat</a>
                                </td>
                            </tr>
                    <?php };
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
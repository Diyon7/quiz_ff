<?php $sql_settings = mysqli_query($con, "SELECT * FROM quiz_settings");
while ($settings = mysqli_fetch_array($sql_settings)) {
    $time_start = $settings['time_start'];
    $time_stop = $settings['time_stop'];

    $right_answer = $settings['right_answer'];
    $null_answer = $settings['null_answer'];
    $wrong_answer = $settings['wrong_answer'];

    $toogle_quiz = $settings['toogle_quiz'];
}; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">DateTime Start</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $time_start ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">DateTime End</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $time_stop ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Point Right Asnwer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $right_answer ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Point Not Asnwer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $null_answer ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dot-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Point Wrong Asnwer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $wrong_answer ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Settings</h6>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <label>Time Management</label>
            <div class="form-row">
                <div class="col">
                    <div class="input-group date" id="time_start" data-target-input="nearest">
                        <input type="text" name="time_start" class="form-control datetimepicker-input" data-target="#time_start" placeholder="DateTime Start">
                        <div class="input-group-append" data-target="#time_start" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-2" style="text-align:center; margin-top:-50px;">
                <label>Tutup/Buka <br> Page Soal</label> <br>
                    <?php
                    if ($toogle_quiz == 0) { ?>
                        <button type="submit" id="submitButton" name="set_toogle_quiz" class="btn btn-secondary">
                            <i class="fas fa-toggle-off fa-2x"></i>
                        </button>
                    <?php } else if ($toogle_quiz == 1) { ?>
                        <button type="submit" id="submitButton" name="set_toogle_quiz" class="btn btn-primary">
                            <i class="fas fa-toggle-on fa-2x"></i>
                        </button>
                    <?php }; ?>
                </div>
                <div class="col">
                    <div class="input-group date" id="time_end" data-target-input="nearest">
                        <input type="text" name="time_end" class="form-control datetimepicker-input" data-target="#time_end" placeholder="DateTime Finish">
                        <div class="input-group-append" data-target="#time_end" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <input type="submit" name="set_time" class="btn btn-primary" value="Set Time">
                </div>
            </div>
            <br>
        </form>

        <form action="" method="post">
            <label>Quiz Point</label>
            <div class="form-row">
                <div class="col">
                    <input type="number" name="right_answer" class="form-control" placeholder="right answer" required>
                </div>
                <div class="col">
                    <input type="number" name="null_answer" class="form-control" placeholder="null answer" required>
                </div>
                <div class="col">
                    <input type="number" name="wrong_answer" class="form-control" placeholder="wrong answer" required>
                </div>
                <div class="col">
                    <input type="submit" name="set_points" class="btn btn-primary" value="Set Points">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Settings</h6>
    </div>

    <div class="card-body">
        <form action="" method="post">
            <label>Quiz Point</label>
            <div class="form-row">
                <div class="col-1">
                    <input type="number" name="id" class="form-control" placeholder="ID" required>
                </div>
                <div class="col">
                    <textarea rows="2" name="peraturan" class="form-control" placeholder="Masukkan PERATURAN" required></textarea>
                </div>
                <div class="col">
                    <input type="submit" name="add_peraturan" class="btn btn-primary" value="Add Peraturan">
                </div>
            </div>
        </form>
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
                        <th width="10%">Id. </th>
                        <th width="90%">peraturan</th>
                        <th width="20%">Edit </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th width="10%">Id. </th>
                        <th width="80%">peraturan</th>
                        <th width="20%">Edit </th>
                    </tr>
                </tfoot>
                <tbody>


                    <?php
                    $sql_mhs = mysqli_query($con, "SELECT * FROM list_peraturan") or die(mysqli_error($con, ""));
                    if (mysqli_num_rows($sql_mhs) > 0) {
                        while ($data = mysqli_fetch_array($sql_mhs)) { ?>
                            <tr>
                                <td><?= $data['id'] ?></td>
                                <td><?= $data['peraturan'] ?></td>
                                <td class="text-center">
                                    <a href="#" onclick="del<?= $data['id'] ?>()" class="btn btn-danger">Delete</a>
                                    <script>
                                        function del<?= $data['id'] ?>() {
                                            var txt;
                                            if (confirm("Anda yakin ingin mendelete data ini?")) {
                                                window.location = "<?= base_url() ?>/_auth/delete_peraturan.php?id=<?= $data['id'] ?>";
                                                txt = "You pressed OK!";
                                            }
                                        }
                                    </script>
                                </td>
                            </tr>
                    <?php };
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- /.container-fluid -->

<?php if (isset($_POST['set_time'])) {
    $time_start = $_POST['time_start'];
    $time_stop = $_POST['time_end'];

    $sql_set = mysqli_query($con, "UPDATE quiz_settings SET time_start='$time_start', time_stop='$time_stop' WHERE id =1") or die(mysqli_error($con, ""));
    echo "<script>window.location='" . base_url() . "/settings.php';</script>";
}
if (isset($_POST['set_points'])) {
    $right_answer = $_POST['right_answer'];
    $null_answer = $_POST['null_answer'];
    $wrong_answer = $_POST['wrong_answer'];

    $sql_set = mysqli_query($con, "UPDATE quiz_settings SET right_answer='$right_answer', null_answer='$null_answer', wrong_answer='$wrong_answer' WHERE id =1") or die(mysqli_error($con, ""));
    echo "<script>window.location='" . base_url() . "/settings.php';</script>";
}
if (isset($_POST['add_peraturan'])) {
    $id = $_POST['id'];
    $peraturan = $_POST['peraturan'];

    $sql_set = mysqli_query($con, "INSERT INTO list_peraturan VALUES ('$id', '$peraturan')") or die(mysqli_error($con, ""));
    echo "<script>window.location='" . base_url() . "/settings.php';</script>";
}
if (isset($_POST['set_toogle_quiz'])) {
    if ($toogle_quiz == 0) {
        $sql_set = mysqli_query($con, "UPDATE quiz_settings set toogle_quiz=true WHERE toogle_quiz=false") or die(mysqli_error($con, ""));
    } else if ($toogle_quiz == 1) {
        $sql_set = mysqli_query($con, "UPDATE quiz_settings set toogle_quiz=false WHERE toogle_quiz=true") or die(mysqli_error($con, ""));
    }
    echo "<script>window.location='" . base_url() . "/settings.php';</script>";
} ?>
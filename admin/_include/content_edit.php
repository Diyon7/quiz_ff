<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
        </div>
        <div class="card-body">
            <?php
            $sql_mhs = mysqli_query($con, "SELECT * FROM quiz_csos");
            while ($data = mysqli_fetch_array($sql_mhs)) {
                if ($data['id'] == $_GET['id']) { ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <img src="<?= base_url() ?>/img/kuis/<?= $data['image'] ?>" alt="" width="200">
                                        <?php if ($data['image'] == null) {
                                                    echo "<p style='margin-left:25%;'>Foto belum diupload</p>";
                                                } ?>
                                    </div>
                                    <div class="col">
                                        <input type="file" name="photo" style="padding-top:20px;">
                                        <input type="submit" name="delete_photo" class="btn btn-danger" value="Hapus Foto">
                                    </div>
                                </div>
                            </div>
                            <textarea rows="5" name="soal" class="form-control" placeholder="Masukkan SOAL"><?= $data['question'] ?></textarea>
                        </div>
                        <br>
                        <div class="form-row">
                            <input type="text" name="pil1" class="form-control" placeholder="Pilihan 1" value="<?= $data['multiple_choice_1'] ?>">
                        </div>
                        <div class="form-row">
                            <input type="text" name="pil2" class="form-control" placeholder="Pilihan 2" value="<?= $data['multiple_choice_2'] ?>">
                        </div>
                        <div class="form-row">
                            <input type="text" name="pil3" class="form-control" placeholder="Pilihan 3" value="<?= $data['multiple_choice_3'] ?>">
                        </div>
                        <div class="form-row">
                            <input type="text" name="pil4" class="form-control" placeholder="Pilihan 4" value="<?= $data['multiple_choice_4'] ?>">
                        </div>
                        <div class="form-row">
                            <input type="text" name="pil5" class="form-control" placeholder="Pilihan 5" value="<?= $data['multiple_choice_5'] ?>">
                        </div>
                        <br>
                        <div class="form-row">
                            <input type="text" name="answer" class="form-control" placeholder="Jawaban" value="<?= $data['answer_key'] ?>">
                        </div>
                        <br>
                        <input type="submit" name="update" class="btn btn-primary" value="Edit Data">
                    </form>
            <?php };
            } ?>
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
                            <th>No</th>
                            <th>Images</th>
                            <th>Question</th>
                            <th>Choice1</th>
                            <th>Choice2</th>
                            <th>Choice3</th>
                            <th>Choice4</th>
                            <th>Choice5</th>
                            <th>Answer</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Images</th>
                            <th>Question</th>
                            <th>Choice1</th>
                            <th>Choice2</th>
                            <th>Choice3</th>
                            <th>Choice4</th>
                            <th>Choice5</th>
                            <th>Answer</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql_mhs = mysqli_query($con, "SELECT * FROM quiz_csos") or die(mysqli_error($con, ""));
                        if (mysqli_num_rows($sql_mhs) > 0) {
                            while ($data = mysqli_fetch_array($sql_mhs)) {
                                if ($data['id'] == $_GET['id']) {
                                    echo "<tr style='background-color: #ddd;'>";
                                } else {
                                    echo "<tr>";
                                } ?>
                                <td><?= $no++ ?></td>
                                <td><img src="<?= base_url() ?>/img/kuis/<?= $data['image'] ?>" alt="" height="50"></td>
                                <td><?= $data['question'] ?></td>
                                <td><?= $data['multiple_choice_1'] ?></td>
                                <td><?= $data['multiple_choice_2'] ?></td>
                                <td><?= $data['multiple_choice_3'] ?></td>
                                <td><?= $data['multiple_choice_4'] ?></td>
                                <td><?= $data['multiple_choice_5'] ?></td>
                                <td><?= $data['answer_key'] ?></td>
                                </tr>
                        <?php };
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
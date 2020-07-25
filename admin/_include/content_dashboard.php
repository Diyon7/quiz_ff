<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Soal</h6>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-2">
                        <input type="text" name="id" class="form-control" placeholder="No. Soal (ID Soal)" required>
                    </div>
                    <div class="col-3"></div>
                    <div class="col">
                        <input type="file" name="photo" style="margin-left: auto; margin-right:auto; padding-bottom:20px;">
                    </div>
                    <textarea rows="4" name="soal" class="form-control" placeholder="Masukkan SOAL" required></textarea>
                </div>
                <br>
                <div class="form-row">
                    <input type="text" name="pil1" class="form-control" placeholder="Pilihan 1" required>
                </div>
                <div class="form-row">
                    <input type="text" name="pil2" class="form-control" placeholder="Pilihan 2" required>
                </div>
                <div class="form-row">
                    <input type="text" name="pil3" class="form-control" placeholder="Pilihan 3" required>
                </div>
                <div class="form-row">
                    <input type="text" name="pil4" class="form-control" placeholder="Pilihan 4" required>
                </div>
                <div class="form-row">
                    <input type="text" name="pil5" class="form-control" placeholder="Pilihan 5" required>
                </div>
                <br>
                <div class="form-row">
                    <input type="text" name="answer" class="form-control" placeholder="Jawaban" required>
                </div>
                <br>
                <input type="submit" name="add" class="btn btn-primary" value="Add Data">
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
                            <th>Id. </th>
                            <th>Images</th>
                            <th>Question</th>
                            <th>Choice1</th>
                            <th>Choice2</th>
                            <th>Choice3</th>
                            <th>Choice4</th>
                            <th>Choice5</th>
                            <th>Answer</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id. </th>
                            <th>Images</th>
                            <th>Question</th>
                            <th>Choice1</th>
                            <th>Choice2</th>
                            <th>Choice3</th>
                            <th>Choice4</th>
                            <th>Choice5</th>
                            <th>Answer</th>
                            <th>Edit</th>
                        </tr>
                    </tfoot>
                    <tbody>


                        <?php
                        $no = 1;
                        $sql_mhs = mysqli_query($con, "SELECT * FROM quiz_csos") or die(mysqli_error($con, ""));
                        if (mysqli_num_rows($sql_mhs) > 0) {
                            while ($data = mysqli_fetch_array($sql_mhs)) { ?>
                                <tr>
                                    <td><?= $data['id'] ?></td>
                                    <td>
                                        <?php if ($data['image'] != null) { ?>
                                            <img src="<?= base_url() ?>/img/kuis/<?= $data['image'] ?>" alt="" height="50">
                                        <?php } ?>
                                    </td>
                                    <td><?= $data['question'] ?></td>
                                    <td><?= $data['multiple_choice_1'] ?></td>
                                    <td><?= $data['multiple_choice_2'] ?></td>
                                    <td><?= $data['multiple_choice_3'] ?></td>
                                    <td><?= $data['multiple_choice_4'] ?></td>
                                    <td><?= $data['multiple_choice_5'] ?></td>
                                    <td><?= $data['answer_key'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url() ?>/edit.php?id=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                                        <a href="#" onclick="del<?= $data['id'] ?>()" class="btn btn-danger">Delete</a>
                                        <script>
                                            function del<?= $data['id'] ?>() {
                                                var txt;
                                                if (confirm("Anda yakin ingin mendelete data ini?")) {
                                                    window.location = "<?= base_url() ?>/_auth/delete.php?id=<?= $data['id'] ?>";
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

</div>


<!-- /.container-fluid -->
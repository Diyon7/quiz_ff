<div class="row">
    <div class="col" style="background-color:white; padding:50px 150px; margin-bottom:40px;">
        <h1 style="text-align:center; padding-bottom:30px;">PERATURAN!</h1>
        <ol style="text-align:justify;">
            <?php
            $sql_mhs = mysqli_query($con, "SELECT * FROM list_peraturan") or die(mysqli_error($con, ""));
            if (mysqli_num_rows($sql_mhs) > 0) {
                while ($data = mysqli_fetch_array($sql_mhs)) { ?>
                    <li style="padding-bottom:10px; color:black"><?= $data['peraturan'] ?></li>
            <?php };
            } ?>
        </ol>
        <a href="<?= base_url() ?>/quiz.php?page=1" style="padding-left:80%;"><button class="btn btn-primary">LANJUTKAN</button></a>
    </div>
</div>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
}

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kodepos = $_POST['kodepos'];
    $query = mysqli_query($con, "update users set nama='$nama',nohp='$nohp',alamat='$alamat',provinsi='$provinsi', kota='$kota', kodepos='$kodepos' where id='" . $_SESSION['id'] . "'");
    if ($query) {
        $_SESSION['msg'] = "Data berhasil diperbarui !!";
    } else {
        $_SESSION['msg'] = "Data gagal diperbarui !!";
    }
}

?>

<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>

<div class="container">
    <div class="breadcumb">
        <p>Beranda / Ganti Profil</p>
    </div>

    <?php if (isset($_POST['update'])) { ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
        </div>
    <?php } ?>


    <form method="POST">

        <?php

        $query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
        $cnt = 1;
        while ($row = mysqli_fetch_array($query)) {


        ?>

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlentities($row['nama']); ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlentities($row['email']); ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="nohp" class="col-sm-2 col-form-label">No Handphone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo htmlentities($row['nohp']); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="alamat" rows="3" name="alamat"><?php echo htmlentities($row['alamat']); ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?php echo htmlentities($row['provinsi']); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kota" name="kota" value="<?php echo htmlentities($row['kota']); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="kodepos" class="col-sm-2 col-form-label">Kode Pos</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kodepos" name="kodepos" value="<?php echo htmlentities($row['kodepos']); ?>">
                </div>
            </div>

        <?php } ?>

        <div class="d-flex align-items-end">

            <input type="submit" name="update" value="Edit Profil" class="btn btn-primary ml-auto">
        </div>

    </form>

</div>

<div class="container">
    <hr />
    <footer>Copyright 2020 Apotek Safir</footer>
</div>

<?php include 'includes/footer.php' ?>
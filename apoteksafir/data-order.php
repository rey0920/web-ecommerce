<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:login.php');
} else {
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

  if (isset($_POST['submit'])) {
    header('location:metode-pembayaran.php');
  }



?>

  <?php include 'includes/header.php' ?>
  <?php include 'includes/navbar.php' ?>


  <div class="container" style="margin-bottom: 50px;">
    <div class="breadcumb mb-5">
      <p>Beranda / Data Order</p>
    </div>

    <?php if (isset($_POST['update'])) { ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
      </div>
    <?php } ?>


    <div class="keranjang table-responsive-md">
      <form method="POST">
        <?php

        $query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
        $cnt = 1;
        while ($row = mysqli_fetch_array($query)) {


        ?>
          <div class="form-row">
            <h4 class="mb-3">Alamat Pengiriman</h4>
            <div class="col-md-12 mb-3">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" id="alamat" rows="3" name="alamat" required><?php echo htmlentities($row['alamat']); ?></textarea>
            </div>
            <div class="col-md-5 mb-3">
              <label for="provinsi">Provinsi</label>
              <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?php echo htmlentities($row['provinsi']); ?>" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="kota">Kota</label>
              <input type="text" class="form-control" id="kota" name="kota" value="<?php echo htmlentities($row['kota']); ?>" required>
            </div>
            <div class="col-md-3 mb-3">
              <label for="kodepos">Kode Pos</label>
              <input type="text" class="form-control" id="kodepos" name="kodepos" value="<?php echo htmlentities($row['kodepos']); ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="nama">Nama Penerima</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlentities($row['nama']); ?>" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="nohp">Nomer Handphone</label>
              <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo htmlentities($row['nohp']); ?>" required>
            </div>
          </div>
        <?php } ?>

        <hr>

        <div class="d-flex align-items-end">
          <button type="submit" class="btn btn-success btn-sm" name="update">Perbarui Data Pengirim</button>
          <button type="submit" class="btn btn-primary btn-sm ml-auto" name="submit">Proses Pembayaran</button>
        </div>


      </form>
    </div>
  </div>

  <div class="container">
    <hr />
    <footer>Copyright 2020 Apotek Safir</footer>
  </div>

  <?php include 'includes/footer.php' ?>

<?php } ?>
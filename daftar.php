<?php
session_start();
error_reporting(0);
include('includes/config.php');
// Code user Registration
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $query = mysqli_query($con, "insert into users(nama,email,password) values('$nama','$email','$password')");
  if ($query) {
    echo "<script>alert('Pembuatan Akun Berhasil');</script>";
  } else {
    echo "<script>alert('Gagal Membuat Akun');</script>";
  }
}

?>

<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>

<div class="container">
  <div class="d-flex justify-content-center">

    <form method="POST">
      <h3 class="mb-4">Daftar</h3>
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masuk Nama Lengkap Anda" />
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Masuk Email Anda" />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Masuk Passowrd" />
      </div>
      <button type="submit" name="submit" class="btn btn-primary" style="width: 100%; margin-top: 30px; margin-bottom: 10px">
        Daftar
      </button>
      <p class="text-center">
        Sudah punya akun ? <a href="login.php">Masuk Sekarang!</a>
      </p>
    </form>
  </div>
</div>


<?php include 'includes/footer.php' ?>
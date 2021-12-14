<?php

session_start();
error_reporting(0);
include("includes/config.php");

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' and password='$password'");
  $num = mysqli_fetch_array($query);

  if ($num > 0) {
    $extra = "index.php";
    $_SESSION['login'] = $_POST['email'];
    $_SESSION['id'] = $num['id'];
    $_SESSION['username'] = $num['nama'];
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("location:http://$host$uri/$extra");
    exit();
  } else {
    $extra = "login.php";
    $email = $_POST['email'];
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("location:http://$host$uri/$extra");
    $_SESSION['errmsg'] = "Invalid email id or Password";
    exit();
  }
}

?>

<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>

<div class="container">

  <div class="d-flex justify-content-center">

    <form method="POST">
      <h3 class="mb-4">Masuk</h3>
      <?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg'] = ""); ?></span>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Masuk Email Anda" />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Masuk Password Anda" />
      </div>
      <button type="submit" name="login" class="btn btn-primary" style="width: 100%; margin-top: 30px; margin-bottom: 10px">
        Masuk
      </button>
      <p class="text-center">
        Belum punya akun ? <a href="daftar.php">Daftar Sekarang!</a>
      </p>
    </form>
  </div>

</div>

<?php include 'includes/footer.php' ?>
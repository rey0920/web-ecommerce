<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
}

if (isset($_POST['submit'])) {
    $sql = mysqli_query($con, "SELECT password FROM users where password='" . md5($_POST['password']) . "' && email='" . $_SESSION['login'] . "'");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
        $qry = mysqli_query($con, "update users set password='" . md5($_POST['newpassword']) . "'where email='" . $_SESSION['login'] . "'");
        $_SESSION['msg'] = "Password berhasil di ganti !!";
    } else {
        $_SESSION['msg'] = "Password lama anda tidak sesuai !!";
    }
}

?>

<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>

<div class="container">

    <form class="form form-horizontal" method="POST">
        <?php if (isset($_POST['submit'])) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
            </div>
        <?php } ?>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Password Lama</label>
            <div class="col-sm-10">
                <input type="password" placeholder="Masukan password lama anda" name="password" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password Baru</label>
            <div class="col-sm-10">
                <input type="password" placeholder="Masukan password lama baru" name="newpassword" class="form-control" required>
            </div>
        </div>
        <input type="submit" name="submit" value="Ganti Password" class="btn btn-primary float-right">
        <a href="menu.php" class="btn btn-link float-right">Kembali</a>
    </form>

</div>

<?php include 'includes/footer.php' ?>
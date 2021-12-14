<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if (isset($_POST['submit'])) {

        mysqli_query($con, "update orders set paymentMethod='" . $_POST['paymethod'] . "' where userId='" . $_SESSION['id'] . "' and paymentMethod is null ");
        unset($_SESSION['cart']);
        header('location:riwayat-pembelian.php');
    }
?>

    <?php include 'includes/header.php' ?>
    <?php include 'includes/navbar.php' ?>

    <div class="container" style="margin-bottom: 50px;">
        <div class="breadcumb mb-5">
            <p>Beranda / Metode Pembayaran</p>
        </div>

        <form method="POST">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" colspan="2">Pilih Metode Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="radio" name="paymethod" value="COD" checked="checked"> COD</td>
                        <td><input type="radio" name="paymethod" value="Transfer"> Transfer</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Pilih Metode Pemayaran" name="submit" class="btn btn-primary btn-sm"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>


<?php } ?>
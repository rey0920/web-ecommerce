<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>

<div class="container">
    <div class="breadcumb">
        <p>Beranda / Cek Transaksi</p>
    </div>

    <form class="register-form outer-top-xs" role="form" method="post" action="order-details.php">
        <div class="form-group">
            <label class="info-title" for="exampleOrderId1">ID Transakksi</label>
            <input type="text" class="form-control unicase-form-control text-input" name="orderid" id="exampleOrderId1" required>
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleBillingEmail1">Email Pembeli</label>
            <input type="email" class="form-control unicase-form-control text-input" name="email" id="exampleBillingEmail1" required>
        </div>
        <button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button">Cek Transaksi</button>
    </form>

</div>

<?php include 'includes/footer.php' ?>
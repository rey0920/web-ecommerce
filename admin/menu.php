<?php

session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Asia/Bangkok');
    $currentTime = date('d-m-Y h:i:s A', time());
}
?>

<?php include 'head.php' ?>

<?php include 'sidebar.php' ?>

<!-- Page Content  -->
<div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-link">
                <i class="navbar-toggler-icon"></i>
            </button>

            <h5>Dashboard Admin</h5>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-primary ">
                        <h5 class="card-title text-white text-right">Order Hari Ini</h5>
                        <?php
                        $f1 = "00:00:00";
                        $from = date('Y-m-d') . " " . $f1;
                        $t1 = "23:59:59";
                        $to = date('Y-m-d') . " " . $t1;
                        $result = mysqli_query($con, "SELECT * FROM Orders where orderDate Between '$from' and '$to'");
                        $num_rows1 = mysqli_num_rows($result); {
                        ?>
                            <h3 class="text-white text-right"><b><?php echo htmlentities($num_rows1); ?></b></h3>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-danger">
                        <h5 class="card-title text-white text-right">Pending Order</h5>
                        <?php
                        $status = 'Delivered';
                        $ret = mysqli_query($con, "SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
                        $num = mysqli_num_rows($ret); { ?>
                            <h3 class="text-white text-right"><b><?php echo htmlentities($num); ?></b></h3>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-success">
                        <h5 class="card-title text-white text-right">Order Sampai</h5>
                        <?php
                        $status = 'Delivered';
                        $rt = mysqli_query($con, "SELECT * FROM Orders where orderStatus='$status'");
                        $num1 = mysqli_num_rows($rt); { ?>
                            <h3 class="text-white text-right"><b><?php echo htmlentities($num1); ?></b></h3>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <br>

    </div>

    <?php include 'footer.php' ?>

    </body>

    </html>
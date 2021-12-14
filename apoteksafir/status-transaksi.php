<?php
session_start();
error_reporting(0);
include_once 'includes/config.php';
$oid = intval($_GET['oid']);
?>

<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>

<div class="container">
    <div class="breadcumb">
        <p>Beranda / Riwayat Pembelian / Status Transaksi</p>
    </div>

    <form name="updateticket" id="updateticket" method="post">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">

            <tr height="50">
                <td colspan="2" style="padding-left:0px;">
                    <div class="fontpink2"> <b>Order Tracking Details !</b></div>
                </td>

            </tr>
            <tr height="30" style="font-size: 30px;">
                <td class="fontkink1"><b>order Id:</b></td>
                <td class="fontkink"><?php echo $oid; ?></td>
            </tr>
            <?php
            $ret = mysqli_query($con, "SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
            $num = mysqli_num_rows($ret);
            if ($num > 0) {
                while ($row = mysqli_fetch_array($ret)) {
            ?>



                    <tr height="20">
                        <td><b>At Date:</b></td>
                        <td><?php echo $row['postingDate']; ?></td>
                    </tr>
                    <tr height="20">
                        <td><b>Status:</b></td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                    <tr height="20">
                        <td><b>Keterangan:</b></td>
                        <td><?php echo $row['keterangan']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr />
                        </td>
                    </tr>
                <?php }
            } else {
                ?>
                <tr>
                    <td colspan="2">Order Not Process Yet</td>
                </tr>
            <?php  }
            $st = 'Delivered';
            $rt = mysqli_query($con, "SELECT * FROM orders WHERE id='$oid'");
            while ($num = mysqli_fetch_array($rt)) {
                $currrentSt = $num['orderStatus'];
            }
            if ($st == $currrentSt) { ?>
                <tr>
                    <td colspan="2"><b>
                            Product Delivered successfully </b></td>
                <?php }

                ?>
        </table>
    </form>
</div>

</body>

</html>
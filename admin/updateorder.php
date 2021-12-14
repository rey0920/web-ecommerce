<?php
session_start();
error_reporting(0);
include_once 'include/config.php';
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $oid = intval($_GET['oid']);
    if (isset($_POST['submit2'])) {
        $status = $_POST['status'];
        $keterangan = $_POST['keterangan'];

        $query = mysqli_query($con, "insert into ordertrackhistory(orderId,status,keterangan) values('$oid','$status','$keterangan')");
        $sql = mysqli_query($con, "update orders set orderStatus='$status' where id='$oid'");
        echo "<script>alert('Order updated sucessfully...');</script>";
        //}
    }

?>
    <?php include 'head.php' ?>
    <?php include 'sidebar.php' ?>

    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-link">
                    <i class="navbar-toggler-icon"></i>
                </button>

                <h5>Update Order</h5>
            </div>
        </nav>

        <form name="updateticket" id="updateticket" method="post">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">

                <tr height="50">
                    <td colspan="2" class="fontkink2" style="padding-left:0px;">
                        <div class="fontpink2"> <b>Update Order !</b></div>
                    </td>

                </tr>
                <tr height="30">
                    <td class="fontkink1"><b>order Id:</b></td>
                    <td class="fontkink"><?php echo $oid; ?></td>
                </tr>
                <?php
                $ret = mysqli_query($con, "SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
                while ($row = mysqli_fetch_array($ret)) {
                ?>



                    <tr height="20">
                        <td class="fontkink1"><b>At Date:</b></td>
                        <td class="fontkink"><?php echo $row['postingDate']; ?></td>
                    </tr>
                    <tr height="20">
                        <td class="fontkink1"><b>Status:</b></td>
                        <td class="fontkink"><?php echo $row['status']; ?></td>
                    </tr>
                    <tr height="20">
                        <td class="fontkink1"><b>Keterangan:</b></td>
                        <td class="fontkink"><?php echo $row['keterangan']; ?></td>
                    </tr>


                    <tr>
                        <td colspan="2">
                            <hr />
                        </td>
                    </tr>
                <?php } ?>
                <?php
                $st = 'Delivered';
                $rt = mysqli_query($con, "SELECT * FROM orders WHERE id='$oid'");
                while ($num = mysqli_fetch_array($rt)) {
                    $currrentSt = $num['orderStatus'];
                }
                if ($st == $currrentSt) { ?>
                    <tr>
                        <td colspan="2"><b>
                                Product Delivered </b></td>
                    <?php } else {
                    ?>

                    <tr height="50">
                        <td class="fontkink1">Status: </td>
                        <td class="fontkink"><span class="fontkink1">
                                <select name="status" class="fontkink" required="required">
                                    <option value="">Pilih Status</option>
                                    <option value="in Process">In Process</option>
                                    <option value="Delivered">Delivered</option>
                                </select>
                            </span></td>
                    </tr>

                    <tr>
                        <td class="fontkink1">Keterangan:</td>
                        <td class="fontkink" align="justify"><span class="fontkink">
                                <textarea cols="50" rows="7" name="keterangan" required="required"></textarea>
                            </span></td>
                    </tr>
                    <tr>
                        <td class="fontkink1">&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="fontkink"> </td>
                        <td class="fontkink"> <input type="submit" name="submit2" value="Perbarui Status Transaksi" size="40" style="cursor: pointer;" class="btn btn-primary" />
                    </tr>
                <?php } ?>
            </table>
        </form>
    </div>

    </body>

    <?php include 'footer.php' ?>

    </html>
<?php } ?>
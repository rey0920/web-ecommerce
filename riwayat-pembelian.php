<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if (isset($_POST['konfirmasi'])) {
        $orderid = $_POST['orderid'];
        $status = $_POST['status'];
        $keterangan = $_POST['keterangan'];

        $query = mysqli_query($con, "insert into ordertrackhistory(orderId,status,keterangan) values('$orderid','$status','$keterangan')");
        $sql = mysqli_query($con, "update orders set orderStatus='$status' where id='$orderid'");
        echo "<script>alert('Pesanan berhasil di konfirmasi');</script>";
    }

?>

    <?php include 'includes/header.php' ?>
    <?php include 'includes/navbar.php' ?>

    <div class="container">

        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col" width="20%">Gambar</th>
                    <th scope="col" width="15%">Nama Barang</th>
                    <th scope="col" width="10%">Harga Satuan</th>
                    <th scope="col" width="10%">Kuantitas</th>
                    <th scope="col" width="10%">Harga Total</th>
                    <th scope="col" width="10%">Metode Pembayaran</th>
                    <th scope="col" width="10%">Tanggal Pembelian</th>
                    <th scope="col" width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $query = mysqli_query($con, "select products.productImage as pimg,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id where orders.userId='" . $_SESSION['id'] . "' and orders.paymentMethod is not null");
                $cnt = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <th scope="row"><img src="admin/productimages/<?php echo $row['pimg']; ?>" alt="Gambar"></th>
                        <td><?php echo $row['pname']; ?></td>
                        <td>Rp <?php echo $price = $row['pprice']; ?></td>
                        <td><?php echo $qty = $row['qty']; ?></td>
                        <td><?php echo ($qty * $price); ?></td>
                        <td><?php echo $row['paym']; ?> </td>
                        <td><?php echo $row['odate']; ?> </td>
                        <td><a href="https://wa.me/089" class="btn btn-secondary btn-sm mb-1">Hubungi Admin</a><br>
                            <a href="status-transaksi.php?oid=<?php echo htmlentities($row['orderid']); ?>" class="btn btn-primary btn-sm mb-1">Status Transaksi</a>
                            <form method="POST">
                                <input type="hidden" name="orderid" value="<?php echo $row['orderid']; ?>">
                                <input type="hidden" name="status" value="Delivered">
                                <input type="hidden" name="keterangan" value="Telah di konfimasi pembeli barang pesanan telah sampai">
                                <input type="submit" value="Konfirmasi Barang Sampai" name="konfirmasi" class="btn btn-success btn-sm">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </div>

    <?php include 'includes/footer.php' ?>

<?php } ?>
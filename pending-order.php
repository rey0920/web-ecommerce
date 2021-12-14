<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if (isset($_GET['id'])) {

        mysqli_query($con, "delete from orders  where userId='" . $_SESSION['id'] . "' and paymentMethod is null and id='" . $_GET['id'] . "' ");;
    }

?>

    <?php include 'includes/header.php' ?>
    <?php include 'includes/navbar.php' ?>

    <div class="container">

        <table class="table table-borderless">
            <thead>
                <tr align="center">
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
                <?php $query = mysqli_query($con, "select products.productImage as pimg,products.productName as pname,products.id as c,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as oid from orders join products on orders.productId=products.id where orders.userId='" . $_SESSION['id'] . "' and orders.paymentMethod is null");
                $cnt = 1;
                $num = mysqli_num_rows($query);
                if ($num > 0) {
                    while ($row = mysqli_fetch_array($query)) {
                ?>
                        <tr>
                            <th scope="row"><img src="admin/productimages/<?php echo $row['pimg']; ?>" alt="Gambar"></th>
                            <td><?php echo $row['pname']; ?></td>
                            <td>Rp <?php echo $price = $row['pprice']; ?></td>
                            <td><?php echo $qty = $row['qty']; ?></td>
                            <td><?php echo ($qty * $price); ?></td>
                            <td><?php echo $row['paym']; ?> </td>
                            <td><?php echo $row['odate']; ?> </td>
                            <td>
                                <a href="pending-order.php?id=<?php echo htmlentities($row['oid']); ?>" class="btn btn-danger btn-sm">Batalkan Pemesanan</a>
                            </td>
                        </tr>
                    <?php $cnt = $cnt + 1;
                    } ?>
                    <tr>
                        <td colspan="7"><a href="metode-pembayaran.php" class="btn btn-primary btn-sm ml-auto">Proses Pembayaran</a></td>
                    </tr>

                <?php } else { ?>
                    <tr>
                        <td colspan="8" align="center">
                            <h4>Pending Order Kosong</h4>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>


    </div>

    <?php include 'includes/footer.php' ?>

<?php } ?>
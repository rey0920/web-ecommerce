<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Asia/Bangkok'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());


?>

    <?php include 'head.php' ?>
    <?php include 'sidebar.php' ?>

    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-link">
                    <i class="navbar-toggler-icon"></i>
                </button>

                <h5>Order Sampai</h5>
            </div>
        </nav>

        <table id="myTable" class="table table-borderless">
            <thead>
                <tr align="center">
                    <th scope="col">No</th>
                    <th scope="col" width="10%">Nama Penerima</th>
                    <th scope="col" width="15%">Email / No HP</th>
                    <th scope="col" width="15%">Alamat</th>
                    <th scope="col" width="15%">Nama Barang</th>
                    <th scope="col" width="10%">Kuantitas</th>
                    <th scope="col" width="10%">Total Harga</th>
                    <th scope="col" width="10%">Tanggal Pemesanan</th>
                    <th scope="col" width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $st = 'Delivered';
                $query = mysqli_query($con, "select users.nama as username,users.email as useremail,users.nohp as usercontact,users.alamat as alamatPenerima,users.kota as kotaPenerima,users.provinsi as provinsiPenerima,users.kodepos as kodeposPenerima,products.productName as productname,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId where orders.orderStatus='$st'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo htmlentities($cnt); ?></td>
                        <td><?php echo htmlentities($row['username']); ?></td>
                        <td><?php echo htmlentities($row['useremail']); ?>/<br><?php echo htmlentities($row['usercontact']); ?></td>

                        <td><?php echo htmlentities($row['alamatPenerima'] . "," . $row['kotaPenerima'] . "," . $row['provinsiPenerima'] . "-" . $row['kodeposPenerima']); ?></td>
                        <td><?php echo htmlentities($row['productname']); ?></td>
                        <td><?php echo htmlentities($row['quantity']); ?></td>
                        <td><?php echo htmlentities($row['quantity'] * $row['productprice']); ?></td>
                        <td><?php echo htmlentities($row['orderdate']); ?></td>
                        <td> <a href="updateorder.php?oid=<?php echo htmlentities($row['id']); ?>" title="Update order" class="btn btn-success btn-sm text-white">Cek Status</a>
                        </td>
                    </tr>

                <?php $cnt = $cnt + 1;
                } ?>
            </tbody>
        </table>

    </div>

    <?php include 'footer.php' ?>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

<?php } ?>
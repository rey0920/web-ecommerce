<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (isset($_POST['update'])) {
  if (!empty($_SESSION['cart'])) {
    foreach ($_POST['quantity'] as $key => $val) {
      if ($val == 0) {
        unset($_SESSION['cart'][$key]);
      } else {
        $_SESSION['cart'][$key]['quantity'] = $val;
      }
    }
    echo "<script>alert('Keranjang berhasil diperbarui');</script>";
  }
}


if (isset($_POST['remove_code'])) {

  if (!empty($_SESSION['cart'])) {
    foreach ($_POST['remove_code'] as $key) {

      unset($_SESSION['cart'][$key]);
    }
    echo "<script>alert('Keranjang berhasil dihapus');</script>";
  }
}


if (isset($_POST['ordersubmit'])) {

  if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
  } else {

    $quantity = $_POST['quantity'];
    $pdd = $_SESSION['pid'];
    $value = array_combine($pdd, $quantity);


    foreach ($value as $qty => $val34) {

      mysqli_query($con, "insert into orders(userId,productId,quantity) values('" . $_SESSION['id'] . "','$qty','$val34')");
      header('location:data-order.php');
    }
  }
}

?>

<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>

<div class="container" style="margin-bottom: 50px;">

  <div class="keranjang table-responsive-md">
    <form name="cart" method="POST">
      <?php
      if (!empty($_SESSION['cart'])) {
      ?>
        <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col" width="20%">Gambar</th>
              <th scope="col" width="30%">Nama Barang</th>
              <th scope="col" width="15%">Harga Satuan</th>
              <th scope="col" width="10%">Kuantitas</th>
              <th scope="col" width="15%">Harga</th>
              <th scope="col" width="10%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $pdtid = array();
            $sql = "SELECT * FROM products WHERE id IN(";
            foreach ($_SESSION['cart'] as $id => $value) {
              $sql .= $id . ",";
            }
            $sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
            $query = mysqli_query($con, $sql);
            $totalprice = 0;
            $totalqunty = 0;
            if (!empty($query)) {
              while ($row = mysqli_fetch_array($query)) {
                $quantity = $_SESSION['cart'][$row['id']]['quantity'];
                $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'];
                $totalprice += $subtotal;
                $_SESSION['qnty'] = $totalqunty += $quantity;

                array_push($pdtid, $row['id']);
                //print_r($_SESSION['pid'])=$pdtid;exit;
            ?>
                <tr>
                  <th scope="row"><img src="admin/productimages/<?php echo $row['productImage']; ?>" alt="Gambar"></th>
                  <td><?php echo $row['productName']; ?></td>
                  <td>Rp <?php echo $row['productPrice']; ?></td>
                  <td><input type="number" style="width: 50px; color: #000;" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]"></td>
                  <td><?php echo $row['productPrice'] * $_SESSION['cart'][$row['id']]['quantity']; ?></td>
                  <td><button type="submit" value="<?php echo htmlentities($row['id']); ?>" name="remove_code[]" class="btn btn-danger">Hapus</button></td>
                </tr>

            <?php }
            }
            $_SESSION['pid'] = $pdtid;
            ?>
            <tr align="right">
              <td colspan="3">
                <p class="font-weight-bolder">Harga Total : <?php echo $_SESSION['tp'] = "$totalprice"; ?></p>
              </td>
              <td colspan="4">
                <button type="submit" class="btn btn-success btn-sm" name="update">Perbarui Data Keranjang</button>
                <button type="submit" class="btn btn-primary btn-sm" name="ordersubmit">Lanjut Pembayaran</button>
              </td>
            </tr>
          </tbody>
        </table>
    </form>
  </div>
</div>

<?php } else {
        echo '<center style="color: red;">Keranjang Kosong</center>';
      } ?>


<?php include 'includes/footer.php' ?>
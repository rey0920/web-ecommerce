<?php
session_start();
include('includes/config.php');

if (isset($_GET['action']) && $_GET['action'] == "add") {
  $pid = intval($_GET['id']);

  if (isset($_SESSION['cart'][$pid])) {
    $_SESSION['cart'][$pid]['quantity']++;
  } else {
    $sql_p = "SELECT * FROM products WHERE id={$pid}";
    $query_p = mysqli_query($con, $sql_p);
    if (mysqli_num_rows($query_p) != 0) {
      $row_p = mysqli_fetch_array($query_p);
      $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
      header('location:keranjang.php');
    } else {
      $message = "Product ID is invalid";
    }
  }
}


$pid = intval($_GET['id']);


?>

<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>


<div class="container">

  <?php
  $query = mysqli_query($con, "SELECT * FROM products WHERE id='$pid'");
  while ($row = mysqli_fetch_array($query)) {
  ?>
    <div class="rincian-produk">
      <div class="row">
        <div class="col-md-7">
          <div class="img-produk">
            <img src="admin/productimages/<?php echo $row['productImage']; ?>" alt="Produk" style="height: auto; width:470px;" />
          </div>
        </div>

        <div class="col-md-4">
          <div class="detail-produk">
            <form method="POST">
              <h3 class="judul text-white"><?php echo $row['productName']; ?></h3>
              <h5 class="harga text-primary"><?php echo $row['productPrice']; ?></h5>
              <p class="pb-4"><?php echo $row['productDescription']; ?></p>
              <a href="detail-produk.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-primary">Beli Sekarang</a>
            </form>

          </div>
        </div>
      </div>
    <?php } ?>
    </div>
</div>

<?php include 'includes/footer.php' ?>
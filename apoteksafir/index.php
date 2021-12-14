<?php

session_start();
error_reporting(0);
include("includes/config.php");

if (isset($_Get['action'])) {
  if (!empty($_SESSION['cart'])) {
    foreach ($_POST['quantity'] as $key => $val) {
      if ($val == 0) {
        unset($_SESSION['cart'][$key]);
      } else {
        $_SESSION['cart'][$key]['quantity'] = $val;
      }
    }
  }
}

?>

<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>

<div class="container">
  <div class="hero">
    <img src="assets/images/hero.png" alt="Hero Image" style="width: 100%" />
  </div>
</div>

<div class="container">
  <div class="content">
    <h3>Produk Terbaru</h3>

    <div class="row">
      <?php $query = mysqli_query($con, "select * from products ORDERS LIMIT 4");
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <div class="col-md-3">
          <a href="detail-produk.php?id=<?php echo $row['id'] ?>" style="text-decoration: none; color: #000">
            <div class="card">
              <img src="admin/productimages/<?php echo htmlentities($row['productImage']); ?>" class="card-img-top mx-auto" alt="Produk Image" />
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo htmlentities($row['productName']); ?></h5>
                <p class="card-text text-primary">Rp <?php echo htmlentities($row['productPrice']); ?></p>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="content">
    <div class="d-flex justify-content-between align-items-center">
      <h3>Obat Generik</h3>
      <a href="category.php?cid=8" class="btn btn-primary btn-sm">Lihat Semua</a>
    </div>

    <div class="row">
      <?php $query = mysqli_query($con, "select * from products where category=8 LIMIT 4");
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <div class="col-md-3">
          <a href="detail-produk.php?id=<?php echo $row['id'] ?>" style="text-decoration: none; color: #000">
            <div class="card">
              <img src="admin/productimages/<?php echo htmlentities($row['productImage']); ?>" class="card-img-top mx-auto" alt="Produk Image" />
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo htmlentities($row['productName']); ?></h5>
                <p class="card-text text-primary">Rp <?php echo htmlentities($row['productPrice']); ?></p>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<div class="container">
  <hr />
  <footer>Copyright 2020 Apotek Safir</footer>
</div>

<?php include 'includes/footer.php' ?>
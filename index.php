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

<div class="container-fluid mb-5" style="padding: 0;">
  <div class="bg-dark-800">
    <h1 class="text-center text-white pt-4" style="padding-bottom: 80px">Menyediakan Berbagai Pesanan Makanan <br>
      Cepat, Murah, dan Enak</h1>

    <div class="category text-center">
      <?php $sql = mysqli_query($con, "select id,categoryName  from category");
      while ($row = mysqli_fetch_array($sql)) {
      ?>

        <a class="mx-4 text-white text-decoration-none" href="category.php?cid=<?php echo $row['id']; ?>"><?php echo $row['categoryName']; ?></a>

      <?php } ?>

    </div>


    <div class="row mt-3 pb-4">
      <div class="col-md-1"></div>
      <div class="col-md-8">
        <form class="form-inline" action="hasil-pencarian.php" method="POST">
          <input class="form-control" type="text" placeholder="Cari Makanan Apa ?" style="width: 100%;" name="product">
      </div>
      <div class="col-md-2">

        <input type="submit" class="btn btn-primary" style="width: 100%;" value="Cari Disini">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="content">
    <h3 class="text-white mb-4">Menu Terbaru</h3>

    <div class="row">
      <?php $query = mysqli_query($con, "select * from products ORDERS LIMIT 4");
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <div class="col-md-3">
          <a href="detail-produk.php?id=<?php echo $row['id'] ?>" style="text-decoration: none; color: #000">
            <div class="card">
              <img src="admin/productimages/<?php echo htmlentities($row['productImage']); ?>" class="card-img-top mx-auto" alt="Produk Image" />
              <div class="card-body">
                <h5 class="card-title text-white"><?php echo htmlentities($row['productName']); ?></h5>
                <p class="card-text text-primary">Rp <?php echo htmlentities($row['productPrice']); ?></p>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="d-flex justify-content-center mb-5">
    <a href="#" class="btn btn-primary">Lihat Semua Menu</a>
  </div>


  <?php include 'includes/footer.php' ?>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid = intval($_GET['cid']);
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $sql_p = "SELECT * FROM products WHERE id={$id}";
        $query_p = mysqli_query($con, $sql_p);
        if (mysqli_num_rows($query_p) != 0) {
            $row_p = mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
            header('location:my-cart.php');
        } else {
            $message = "Product ID is invalid";
        }
    }
}

?>

<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>

<div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <?php $sql = mysqli_query($con, "select categoryName  from category where id='$cid'");
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <h3><?php echo htmlentities($row['categoryName']); ?></h3>
        <?php } ?>
    </div>
    <div class="content">
        <div class="row">
            <?php
            $ret = mysqli_query($con, "select * from products where category='$cid'");
            $num = mysqli_num_rows($ret);
            if ($num > 0) {
                while ($row = mysqli_fetch_array($ret)) { ?>
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
                <?php }
            } else { ?>
                <center>Barang tidak ada!</center>
            <?php } ?>
        </div>
    </div>
</div>
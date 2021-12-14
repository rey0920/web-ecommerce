<div class="navigasi shadow-sm p-3 mb-5 bg-white rounded">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Apotek <span class="text-primary">Safir</span></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="justify-content-center">
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <form class="navbar-form" action="hasil-pencarian.php" method="POST">
                        <input class="form-control mr-sm-2" type="search" name="product" placeholder="Cari obat yang anda cari disini..." style="width: 550px" />
                    </form>
                </div>
            </div>

            <div class="justify-content-end">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <?php
                        if (!empty($_SESSION['cart'])) {
                        ?>
                            <a href="keranjang.php" class="nav-link"><i class="bi bi-cart3"></i>
                                <!-- <span class="badge badge-pill badge-primary"><?php echo $_SESSION['qnty'] ?></span> -->
                            </a>
                        <?php } else { ?>
                            <a href="keranjang.php" class="nav-link"><i class="bi bi-cart3"></i>
                                <!-- <span class="badge badge-pill badge-primary">0</span> -->
                            </a>
                        <?php } ?>
                    </li>

                    <?php if (!empty($_SESSION['login'])) {   ?>
                        <li class="nav-item" style="font-size: 14px;">
                            <div class="btn-group">
                                <button class="nav-link btn btn-link btn-sm dropdown-toggle text-decoration-none" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <a href="#" class="text-dark"><?php echo htmlentities($_SESSION['username']); ?></a>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="ganti-profil.php">Profil Akun</a>
                                    <a class="dropdown-item" href="riwayat-pembelian.php">Riwayat Pembelian</a>
                                    <a class="dropdown-item" href="pending-order.php">Pending Order</a>
                                    <a class="dropdown-item" href="ganti-password.php">Ganti Password</a>
                                </div>
                            </div>

                        </li>
                        <li class="nav-item" style="font-size: 14px;">
                            <a class="nav-link text-primary" href="logout.php">Logout</a>
                        </li>

                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="daftar.php">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="login.php">Masuk</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <ul class="nav justify-content-center">
        <?php $sql = mysqli_query($con, "select id,categoryName  from category");
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <li class="nav-item">

                <a class="nav-link text-dark" href="category.php?cid=<?php echo $row['id']; ?>"><?php echo $row['categoryName']; ?></a>

            </li>
        <?php } ?>
    </ul>
</div>
</div>
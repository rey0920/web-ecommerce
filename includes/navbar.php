<nav class="navbar pt-4 pb-4">
    <div class="container">
        <a class="navbar-brand text-white font-weight-semibold" href="index.php" style="cursor: pointer">DAR <span class="text-primary">Kitchen</span></a>

        <div class="d-flex justify-content-end">
            <div class="align-items-center">

                <a href="keranjang.php" class="mr-4 text-white text-decoration-none">Keranjang <span class="ml-4">|</span></a>
                <?php if (!empty($_SESSION['login'])) {   ?>
                    <div class="btn-group">
                        <button class="btn btn-primary btn-sm dropdown-toggle text-decoration-none px-3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href="#" class="text-white"><?php echo htmlentities($_SESSION['username']); ?></a>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="ganti-profil.php">Profil Akun</a>
                            <a class="dropdown-item" href="riwayat-pembelian.php">Riwayat Pembelian</a>
                            <a class="dropdown-item" href="pending-order.php">Pending Order</a>
                            <a class="dropdown-item" href="ganti-password.php">Ganti Password</a>
                        </div>


                        <a class="nav-link text-primary" href="logout.php">Logout</a>


                    <?php } else { ?>
                        <a href="login.php" class="mr-4 text-white text-decoration-none">Masuk</a>
                        <a href="daftar.php" class="btn btn-primary px-4">Daftar</a>
                    <?php } ?>

                    </div>
            </div>
        </div>
</nav>
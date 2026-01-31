<?php

include_once "config/database.php";

$currentPage = basename($_SERVER['PHP_SELF']);
$isLogin = isset($_SESSION['role']);
$role = $isLogin ? $_SESSION['role'] : '';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container">

        <!-- BRAND -->
        <a class="navbar-brand" href="#">E-Commerce</a>

        <?php
        // =========================
        // INDEX & LOGIN (MINIMAL)
        // =========================
        if (in_array($currentPage, ['index.php', 'login.php'])):
        ?>

            <?php if ($currentPage === 'login.php'): ?>
                <a href="index.php" class="ms-auto text-white text-decoration-none">
                    <i class="bi bi-backspace-fill"> Back</i>
                </a>
            <?php endif; ?>

        <?php
        // =========================
        // HALAMAN SETELAH LOGIN
        // =========================
        elseif ($isLogin):
        ?>

            <!-- HAMBURGER -->
            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- COLLAPSE -->
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="ms-auto d-flex align-items-center gap-3">

                    <?php if ($role == 'R02'): ?>
                        <a href="listCart.php">
                            <img src="icon/shoping-cart.png" height="30">
                        </a>
                    <?php endif; ?>

                    <form class="d-flex" role="search" method="POST">
                        <input
                            class="form-control me-2"
                            type="search"
                            name="keyword"
                            placeholder="Searching..."
                            value="<?= $_POST['keyword'] ?? '' ?>">
                        <button class="btn btn-outline-success" type="submit">
                            Search
                        </button>
                    </form>

                </div>
            </div>

            <!-- PROFILE DROPDOWN -->
            <div class="dropdown ms-3">
                <a href="#" class="dropdown-toggle text-decoration-none"
                    data-bs-toggle="dropdown">
                    <img src="icon/buku.png" width="40" height="40"
                        class="rounded-circle" style="cursor:pointer">
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li><a class="dropdown-item" href="editProfile.php">Profile</a></li>
                    <?php if ($role == 'R01'): ?>
                        <li><a class="dropdown-item" href="addProduct.php">New Product</a></li>
                    <?php endif; ?>
                    <?php if ($role == 'R02'): ?>
                        <li><a class="dropdown-item" href="addSeller.php">Open Shop</a></li>
                    <?php endif; ?>
                    <?php if ($role == 'R03'): ?>
                        <li><a class="dropdown-item" href="activation.php">Activation Seller</a></li>
                        <li><a class="dropdown-item" href="listSeller.php">List Seller</a></li>
                        <li><a class="dropdown-item" href="addAdmin.php">New Admin</a></li>
                        <li><a class="dropdown-item" href="listAdmin.php">List Admin</a></li>
                    <?php endif; ?>
                    <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                </ul>
            </div>

        <?php endif; ?>

    </div>
</nav>
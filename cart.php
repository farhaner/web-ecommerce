<?php
include_once 'config/database.php';
$query = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="container mt-4">
    <div class="row g-4">

      <?php while ($row = mysqli_fetch_assoc($query)) : ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="card h-100">

            <a href="detail.php?id=<?= $row['id']; ?>" class="text-decoration-none text-dark">
              <img src="uploads/<?= $row['gambar']; ?>"
                class="card-img-top"
                alt="<?= $row['nama']; ?>">
            </a>

            <div class="card-body">
              <h5 class="card-title"><?= $row['nama']; ?></h5>
              <p class="card-text">
                Rp. <?= number_format($row['harga'], 0, ',', '.'); ?>
              </p>

              <div class="d-flex gap-2 mt-3">
                <button class="btn btn-primary btn-sm"
                  onclick="showToast()">
                  Add Cart
                </button>

                <a href="checkout.php?id=<?= $row['id']; ?>"
                  class="btn btn-success btn-sm">
                  Checkout
                </a>
              </div>
            </div>

          </div>
        </div>
      <?php endwhile; ?>

    </div>
  </div>

  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="cartToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Cart</strong>
        <small>Baru saja</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
      </div>
      <div class="toast-body">
        Produk berhasil ditambahkan ke cart
      </div>
    </div>
  </div>
</body>

</html>
<?php
include_once 'config/database.php';
$query = mysqli_query($conn, "SELECT id, name, description, price, stock, image_url FROM products WHERE is_active = 0");
?>
<div class="container mt-4">
  <div class="row g-4">

    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card h-100">

          <a href="detail.php?id=<?= $row['id']; ?>" class="text-decoration-none text-dark">
            <img src="up  loads/<?= $row['image_url']; ?>"
              class="card-img-top"
              alt="<?= $row['name']; ?>">
          </a>

          <div class="card-body">
            <h5 class="card-title"><?= $row['name']; ?></h5>
            <p class="card-text">
              Rp. <?= number_format($row['price'], 0, ',', '.'); ?>
            </p>

            <div class="d-flex gap-2 mt-3">
              <button class="btn btn-primary btn-sm">
                Approve
              </button>

              <a href="checkout.php?id=<?= $row['id']; ?>"
                class="btn btn-danger btn-sm">
                Reject
              </a>
            </div>
          </div>

        </div>
      </div>

    <?php
    endwhile;
    ?>
  </div>
</div>
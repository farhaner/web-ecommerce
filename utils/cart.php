<?php
include_once 'config/database.php';

if ($role == 'R01') {
  $query = mysqli_query($conn, "SELECT id, is_active, name, description, price, stock, image_url FROM products");
} else if ($role == 'R02') {
  $query = mysqli_query($conn, "SELECT id, is_active, name, description, price, stock, image_url FROM products WHERE is_active = 1");
} else {
  $query = mysqli_query($conn, "SELECT id, is_active, name, description, price, stock, image_url FROM products WHERE is_active = 0");

  if (isset($_GET['action'], $_GET['id']) && $role == 'R03') {

    $id = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'approve') {
      $status = 1;
    } elseif ($action == 'reject') {
      $status = 0;
    }

    mysqli_query($conn, "UPDATE products SET is_active = $status WHERE id = '$id'");

    header("Location: index.php");
    exit;
  }
}
?>
<div class="container mt-4">
  <div class="row g-4">

    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card h-100">

          <a href="detail.php?id=<?= $row['id']; ?>" class="text-decoration-none text-dark">
            <img src="uploads/<?= $row['image_url']; ?>"
              class="card-img-top"
              alt="<?= $row['name']; ?>">
          </a>

          <div class="card-body">
            <h5 class="card-title"><?= $row['name']; ?></h5>
            <p class="card-text">
              Rp. <?= number_format($row['price'], 0, ',', '.'); ?>
            </p>

            <?php if ($role == 'R01') : ?>
              <?php
              $btn_class = ($row['is_active'] == 1) ? 'btn-success' : 'btn-danger';
              $btn_label = ($row['is_active'] == 1) ? 'Approved' : 'Not Approved';
              ?>
              <button class="btn <?= $btn_class ?> btn-sm">
                <?= $btn_label ?>
              </button>
            <?php endif; ?>

            <?php if ($role == 'R02') : ?>
              <div class="d-flex gap-2 mt-3">
                <button class="btn btn-primary btn-sm">Add Cart</button>
                <a href="checkout.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">
                  Checkout
                </a>
              </div>
            <?php endif; ?>

            <?php if ($role == 'R03') : ?>
              <div class="d-flex gap-2 mt-3">
                <a href="?action=approve&id=<?= $row['id']; ?>"
                  class="btn btn-success btn-sm"
                  onclick="return confirm('Approve this product?')">
                  Approve
                </a>

                <a href="?action=reject&id=<?= $row['id']; ?>"
                  class="btn btn-danger btn-sm"
                  onclick="return confirm('Reject this product?')">
                  Reject
                </a>
              </div>
            <?php endif; ?>

          </div>

        </div>
      </div>
    <?php endwhile; ?>

  </div>
</div>
<?php
include_once 'config/database.php';
include_once 'utils/header.php';
?>

<div class="container my-5">
  <div class="row g-4">

    <!-- DETAIL PRODUK -->
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-body">

          <h5 class="mb-4">Detail Produk</h5>

          <div class="d-flex align-items-center">
            <img src="<?= $product['image'] ?>" width="120" class="rounded me-3">

            <div>
              <h6 class="mb-1"><?= $product['name'] ?></h6>
              <p class="mb-1">Qty: <?= $product['qty'] ?></p>
              <strong>Rp <?= number_format($product['price']) ?></strong>
            </div>
          </div>

          <hr>

          <div class="d-flex justify-content-between">
            <span>Subtotal</span>
            <strong>Rp <?= number_format($subtotal) ?></strong>
          </div>

        </div>
      </div>
    </div>

    <!-- PAYMENT -->
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">

          <h5 class="mb-4">Metode Pembayaran</h5>

          <form method="POST" action="payment.php">

            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="payment" value="transfer" required>
              <label class="form-check-label">
                Transfer Bank
              </label>
            </div>

            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="payment" value="ewallet">
              <label class="form-check-label">
                E-Wallet (OVO / DANA)
              </label>
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="payment" value="cod">
              <label class="form-check-label">
                COD (Bayar di Tempat)
              </label>
            </div>

            <hr>

            <div class="d-flex justify-content-between mb-3">
              <span>Total Bayar</span>
              <strong class="text-success">
                Rp <?= number_format($subtotal) ?>
              </strong>
            </div>

            <button class="btn btn-success w-100">
              Bayar Sekarang
            </button>

          </form>

        </div>
      </div>
    </div>

  </div>
</div>

<?php
include_once 'utils/footer.php';
?>
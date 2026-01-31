<?php
include_once 'config/database.php';
include_once 'utils/header.php';
include_once 'utils/auth.php';

$payment = $_POST['payment'] ?? '';

function generateVA() {
    return rand(1000, 9999)
         . rand(1000, 9999)
         . rand(1000, 9999)
         . rand(1000, 9999);
}
?>

<div class="container mt-5" style="max-width: 600px;">
  <div class="card shadow">
    <div class="card-body text-center">

      <?php if ($payment === 'transfer'): ?>
        <?php $va = generateVA(); ?>

        <h4 class="mb-3">Transfer Bank</h4>
        <p class="text-muted">Silakan lakukan pembayaran ke Virtual Account berikut:</p>

        <div class="alert alert-info fs-5 fw-bold">
          <?= $va ?>
        </div>

        <p class="small text-muted">
          Virtual Account berlaku selama 24 jam
        </p>

      <?php elseif ($payment === 'ewallet'): ?>

        <h4 class="mb-3">Pembayaran E-Wallet</h4>
        <div class="alert alert-success">
          Pembayaran via OVO / DANA sedang diproses
        </div>

      <?php elseif ($payment === 'cod'): ?>

        <h4 class="mb-3">Cash On Delivery</h4>
        <div class="alert alert-warning">
          Pesanan berhasil dibuat. Silakan bayar di tempat.
        </div>

      <?php else: ?>
        <div class="alert alert-danger">
          Metode pembayaran tidak valid
        </div>
      <?php endif; ?>

      <a href="confirmation.php" class="btn btn-primary mt-3">
        Kembali ke Beranda
      </a>

    </div>
  </div>
</div>

<?php
include_once 'utils/footer.php';
?>

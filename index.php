<?php
include_once 'utils/header.php';
include_once 'utils/navbar.php';
?>

<section class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold mb-3">
                    Belanja Online <span class="text-info">Mudah</span> & <span class="text-info">Aman</span>
                </h1>
                <p class="text-muted mb-4">
                    Temukan produk terbaik dengan harga terjangkau, pengiriman cepat,
                    dan sistem pembayaran yang aman.
                </p>
                <a href="#" class="btn btn-info btn-lg me-2">Mulai Belanja</a>
                <a href="#" class="btn btn-outline-info btn-lg">Lihat Produk</a>
            </div>
            <div class="col-md-6 text-center">
                <img src="https://via.placeholder.com/450x300" class="img-fluid rounded" alt="Hero Image">
            </div>
        </div>
    </div>
</section>

<!-- KEUNGGULAN -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Kenapa Pilih Kami?</h2>
            <p class="text-muted">Kami memberikan pengalaman belanja terbaik untuk kamu</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-4">
                    <i class="bi bi-truck fs-1 text-info mb-3"></i>
                    <h5 class="fw-semibold">Pengiriman Cepat</h5>
                    <p class="text-muted">Produk dikirim dengan aman dan cepat ke seluruh Indonesia.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-4">
                    <i class="bi bi-shield-check fs-1 text-info mb-3"></i>
                    <h5 class="fw-semibold">Pembayaran Aman</h5>
                    <p class="text-muted">Sistem pembayaran terenkripsi dan terpercaya.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center p-4">
                    <i class="bi bi-tags fs-1 text-info mb-3"></i>
                    <h5 class="fw-semibold">Harga Terbaik</h5>
                    <p class="text-muted">Dapatkan harga kompetitif dan promo menarik.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PRODUK UNGGULAN -->
<section class="bg-light py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Produk Unggulan</h2>
            <p class="text-muted">Pilihan favorit pelanggan kami</p>
        </div>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/300" class="card-img-top">
                    <div class="card-body text-center">
                        <h6 class="fw-semibold">Produk A</h6>
                        <p class="text-info fw-bold">Rp 150.000</p>
                        <a href="#" class="btn btn-info btn-sm">Beli</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/300" class="card-img-top">
                    <div class="card-body text-center">
                        <h6 class="fw-semibold">Produk B</h6>
                        <p class="text-info fw-bold">Rp 200.000</p>
                        <a href="#" class="btn btn-info btn-sm">Beli</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/300" class="card-img-top">
                    <div class="card-body text-center">
                        <h6 class="fw-semibold">Produk C</h6>
                        <p class="text-info fw-bold">Rp 250.000</p>
                        <a href="#" class="btn btn-info btn-sm">Beli</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/300" class="card-img-top">
                    <div class="card-body text-center">
                        <h6 class="fw-semibold">Produk D</h6>
                        <p class="text-info fw-bold">Rp 300.000</p>
                        <a href="#" class="btn btn-info btn-sm">Beli</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5 text-center bg-info text-white">
    <div class="container">
        <h2 class="fw-bold mb-3">Siap Mulai Belanja?</h2>
        <p class="mb-4">Daftar sekarang dan nikmati promo menarik setiap hari</p>
        <a href="addProfile.php" class="btn btn-light btn-lg fw-semibold">Daftar Sekarang</a>
        <p class="mb-4">Sudah punya akun? Silahkan <a href="login.php" class="text-decoration-none">login</a></p>

    </div>
</section>

<!-- FOOTER -->
<footer class="bg-dark text-white py-3">
    <div class="container text-center">
        <small>© 2026 E-Commerce. All rights reserved.</small>
    </div>
</footer>

<?php
include_once 'utils/footer.php';
?>
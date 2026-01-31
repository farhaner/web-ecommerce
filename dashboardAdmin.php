<?php
include_once 'config/database.php';
include_once 'utils/auth.php';

date_default_timezone_set('Asia/Jakarta');

$nama_admin = $_SESSION['nickname'] ?? 'Admin';
$jam = date('H');

if ($jam >= 5 && $jam < 12) {
    $salam = 'pagi';
    $icon = 'bi-brightness-high';
    $bg = 'bg-warning-subtle';
} elseif ($jam >= 12 && $jam < 15) {
    $salam = 'siang';
    $icon = 'bi-sun';
    $bg = 'bg-info-subtle';
} elseif ($jam >= 15 && $jam < 18) {
    $salam = 'sore';
    $icon = 'bi-cloud-sun';
    $bg = 'bg-primary-subtle';
} else {
    $salam = 'malam';
    $icon = 'bi-moon-stars';
    $bg = 'bg-dark-subtle';
}

include_once "utils/header.php";
include_once "utils/navbar.php";
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0 <?= $bg ?>">
                <div class="card-body d-flex align-items-center justify-content-between">

                    <div>
                        <h4 class="fw-bold mb-1">
                            Halo, selamat <?= $salam ?> <?= $nama_admin ?>
                        </h4>
                        <p class="mb-0 text-muted">
                            Progress over perfection
                        </p>
                    </div>

                    <div class="fs-1 text-secondary">
                        <i class="bi <?= $icon ?>"></i>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<?php
include_once "utils/footer.php";
?>
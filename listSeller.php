<?php
include_once 'config/database.php';

$success = '';

/* =====================
   PROSES ACTION ADMIN
===================== */
if (isset($_GET['action'], $_GET['id'])) {

    $id = (int) $_GET['id'];
    $action = $_GET['action'];

    if ($action === 'approve') {
        $status = 1;
        $success = 'approved';
    } elseif ($action === 'reject') {
        $status = 0;
        $success = 'rejected';
    } else {
        header("Location: listSeller.php");
        exit;
    }

    mysqli_query($conn, "
        UPDATE users 
        SET is_active = $status 
        WHERE id = $id
    ");

    header("Location: listSeller.php");
    exit;
}

/* =====================
   QUERY USER AKTIF
===================== */
$query = mysqli_query($conn, "
     SELECT id, nickname, fullname, email, address, is_active 
    FROM users 
    WHERE is_active = 1 AND role_id = 'R02'
");

$keyword = $_POST['keyword'] ?? '';

if ($keyword !== '') {
    $stmt = $conn->prepare(
        "SELECT id, nickname, fullname, email, address, is_active 
         FROM users 
         WHERE fullname LIKE ? AND is_active = 1 AND role_id = 'R02'
         "
    );

    $search = "%" . $keyword . "%";
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $query = $stmt->get_result();
} else {
    $query = mysqli_query(
        $conn,
        "SELECT id, nickname, fullname, email, address, is_active 
         FROM users 
         WHERE is_active = 1 AND role_id = 'R02'"
    );
}

include_once 'utils/header.php';
include_once 'utils/navbar.php';
?>

<div class="container mt-4">
    <div class="row g-4">

        <?php if ($success === 'rejected'): ?>
            <div class="alert alert-danger">
                Data is Rejected
            </div>
        <?php endif; ?>

        <?php if ($success === 'approved'): ?>
            <div class="alert alert-success">
                Data isi Approved
            </div>
        <?php endif; ?>


        <?php while ($row = mysqli_fetch_assoc($query)) : ?>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">

                        <h5><?= $row['fullname']; ?></h5>
                        <p class="mb-1"><?= $row['email']; ?></p>
                        <p class="text-muted"><?= $row['address']; ?></p>

                        <div class="d-flex gap-2 mt-3">
                            <!-- <a href="?action=approve&id=<?= $row['id']; ?>"
                                class="btn btn-success btn-sm"
                                onclick="return confirm('Approve this user?')">
                                Approve
                            </a> -->

                            <a href="?action=reject&id=<?= $row['id']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Reject this user?')">
                                Inactive
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        <?php endwhile; ?>

    </div>
</div>

<?php
include_once 'utils/footer.php';
?>
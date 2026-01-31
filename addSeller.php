<?php
include_once 'config/database.php';
include_once 'utils/auth.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullname  = trim($_POST['fullname']);
    $nickname  = trim($_POST['nickname']);
    $email     = trim($_POST['email']);
    $shopname     = trim($_POST['shopname']);
    $address   = trim($_POST['address']);
    $password  = trim($_POST['password']);

    if ($fullname == '' || $nickname == '' || $email == '' || $email == '') {
        $error = "All field is required!";
    }

    // HASH PASSWORD (WAJIB) nanti akan di implementasi
    // $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $query = mysqli_query($conn, "
            INSERT INTO users 
            (fullname, nickname, email, address, password, shop_name, is_active, role_id)
            VALUES
            ('$fullname', '$nickname', '$email', '$address', '$password', '$shopname', '0', 'R02')
        ");

    if ($query) {
        $_SESSION['success'] = "Registration success, please login";
        header("Location: login.php");
        exit;
    }
}
include_once 'utils/header.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-body">

                    <h4 class="text-center mb-5">Register Shop</h4>

                    <!-- FOTO PROFILE -->
                    <!-- <div class="text-center mb-4">
                        <img src="icon/profile.jpg"
                            class="rounded-circle"
                            width="120"
                            height="120"
                            style="object-fit: cover;">
                    </div> -->

                    <?php if ($success): ?>
                        <div class="alert alert-success">Account Created, please login!</div>
                    <?php endif; ?>

                    <!-- FORM PROFILE -->
                    <form
                        method="post"
                        enctype="multipart/form-data">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="fullname" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nickname</label>
                            <input type="text" name="nickname" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Shop Name</label>
                            <input type="text" name="shopname" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" name="foto" class="form-control" accept="image/*">
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-3">
                            <button class="btn btn-success btn-sm" type="submit">
                                Open Shop
                            </button>
                            <a href="index.php" class="btn btn-danger btn-sm">
                                Cancel
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php
include_once 'utils/footer.php';
?>
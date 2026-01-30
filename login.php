<?php
include_once 'config/database.php';

$inactive = false;
$error = false;

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT u.nickname, u.password, r.code_role, u.is_active
              FROM users u
              JOIN roles r ON u.role_id = r.code_role
              WHERE u.email = ?";

  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if ($password === $user['password']) {

      if ($user['is_active'] == 0) {
        $inactive = true;
      } else {
        $_SESSION['role'] = $user['code_role'];

        if ($user['code_role'] == 'R03') {
          header("Location: dashboardAdmin.php");
        } else {
          header("Location: dashboardUser.php");
        }
        exit;
      }
    } else {
      $error = true;
    }
  } else {
    $error = true;
  }
}

include_once 'utils/header.php';
?>

<div class="container mt-5" style="max-width: 400px;">
  <div class="card shadow-sm">
    <div class="card-body">

      <h4 class="text-center mb-4">Login</h4>

      <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success mb-2">
          <?= $_SESSION['success']; ?>
        </div>
      <?php unset($_SESSION['success']);
      endif; ?>
      
      <?php if ($inactive): ?>
        <div class="alert alert-warning mb-2">
          Akun Anda belum aktif. Silakan tunggu persetujuan admin.
        </div>
      <?php endif; ?>

      <?php if ($error): ?>
        <div class="alert alert-danger mb-2">
          Email atau password salah!
        </div>
      <?php endif; ?>

      <form method="POST" action="">
        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" name="login" class="btn btn-primary w-100">
          Login
        </button>
      </form>

    </div>
  </div>
</div>

<?php
include_once 'utils/footer.php';
?>
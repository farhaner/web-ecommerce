<?php
include_once 'config/database.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT u.nickname, u.password, r.code_role 
              FROM users u
              JOIN roles r ON u.role_id = r.code_role
              WHERE u.email = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // $query = mysqli_query(
    //     $conn,
    //     "SELECT u.nickname, u.password, r.code_role 
    //           FROM users u
    //           JOIN roles r ON u.role_id = r.code_role
    //           WHERE u.email = ?"
    // );
    // $raw = mysqli_fetch_assoc($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if ($password === $user['password']) {
            // $_SESSION['user_id'] = $user['id'];
            // $_SESSION['nickname'] = $user['nickname'];
            $_SESSION['role'] = $user['code_role'];
            header("Location: index.php");
            exit;
        } else {
            $error = "Email/Password tidak ditemukan!";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5" style="max-width: 400px;">
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
</body>

</html>
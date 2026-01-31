<?php include_once 'config/database.php';
if (!isset($_SESSION['role'])) {
    header("Location: index.php");
    exit;
}
?>
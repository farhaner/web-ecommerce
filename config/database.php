 <?php
$conn = mysqli_connect("localhost", "root", "", "db-ecommerce");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

session_start();

<?php
include 'config/db.php';

$total = 0;
foreach ($_SESSION['cart'] as $id => $qty) {
  $p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id_product=$id"));
  $total += $p['harga'] * $qty;
}

mysqli_query($conn, "INSERT INTO transactions (tanggal, total_harga, status)
VALUES (NOW(), $total, 'success')");

$id_transaksi = mysqli_insert_id($conn);

foreach ($_SESSION['cart'] as $id => $qty) {
  $p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id_product=$id"));
  mysqli_query($conn, "INSERT INTO transaction_details (id_transaksi, id_product, qty, harga)
  VALUES ($id_transaksi, $id, $qty, {$p['harga']})");
}

unset($_SESSION['cart']);
echo "<script>alert('Transaksi Berhasil');location='index.php';</script>";

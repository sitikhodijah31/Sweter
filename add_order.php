<?php
include 'koneksi.php';

$user_id = 1;
$order_code = "ORD-" . time();
$total = 150000;

mysqli_query($conn, "
INSERT INTO orders (user_id, order_code, total, status)
VALUES ($user_id, '$order_code', $total, 'Diproses')
");

echo "Pesanan berhasil masuk ke database";
?>

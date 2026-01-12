<?php
include 'koneksi.php';

$user_id = 1; // sementara (nanti dari login)
$status = $_GET['status'] ?? 'Semua';

$sql = "SELECT * FROM orders WHERE user_id=$user_id";

if ($status != 'Semua') {
    $sql .= " AND status='$status'";
}

$q = mysqli_query($conn, $sql);
?>

<h2>Riwayat Pesanan Saya</h2>

<!-- TAB STATUS -->
<a href="?status=Semua">Semua</a> |
<a href="?status=Diproses">Diproses</a> |
<a href="?status=Dikirim">Dikirim</a> |
<a href="?status=Selesai">Selesai</a> |
<a href="?status=Dibatalkan">Dibatalkan</a>

<hr>

<?php
if (mysqli_num_rows($q) == 0) {
    echo "Tidak ada pesanan";
}

while ($row = mysqli_fetch_assoc($q)) {
?>
    <p>
        <b><?= $row['order_code']; ?></b><br>
        Total: Rp<?= number_format($row['total']); ?><br>
        Status: <?= $row['status']; ?>
    </p>
    <hr>
<?php } ?>

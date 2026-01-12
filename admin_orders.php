<?php
include 'koneksi.php';
$q = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="mb-4">📦 Manajemen Pesanan (Admin)</h3>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Kode Order</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Ubah Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; while ($row = mysqli_fetch_assoc($q)) { ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $row['order_code']; ?></td>
                        <td>Rp<?= number_format($row['total']); ?></td>
                        <td class="text-center">
                            <?php
                            $badge = match($row['status']) {
                                'Diproses' => 'warning',
                                'Dikirim' => 'primary',
                                'Selesai' => 'success',
                                'Dibatalkan' => 'danger',
                            };
                            ?>
                            <span class="badge bg-<?= $badge; ?>">
                                <?= $row['status']; ?>
                            </span>
                        </td>
                        <td>
                            <form action="update_status.php" method="post" class="d-flex gap-2">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">

                                <select name="status" class="form-select form-select-sm">
                                    <option <?= $row['status']=='Diproses'?'selected':''; ?>>Diproses</option>
                                    <option <?= $row['status']=='Dikirim'?'selected':''; ?>>Dikirim</option>
                                    <option <?= $row['status']=='Selesai'?'selected':''; ?>>Selesai</option>
                                    <option <?= $row['status']=='Dibatalkan'?'selected':''; ?>>Dibatalkan</option>
                                </select>

                                <button class="btn btn-sm btn-success">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>

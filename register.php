<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<body>
<h2>Registrasi</h2>
<form method="POST">
    <input name="name" placeholder="Nama" required><br>
    <input name="email" type="email" required><br>
    <input name="password" type="password" required><br>
    <input name="address" placeholder="Alamat"><br>
    <input name="city" placeholder="Kota"><br>
    <input name="postal"><br>
    <input name="phone"><br>
    <button>Daftar</button>
</form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO users 
    (name,email,password,address,city,postal_code,phone)
    VALUES (
    '$_POST[name]',
    '$_POST[email]',
    '$pass',
    '$_POST[address]',
    '$_POST[city]',
    '$_POST[postal]',
    '$_POST[phone]'
    )");
    header("Location: index.php");
}
?>

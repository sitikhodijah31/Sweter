<?php
include 'koneksi.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$q = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($q);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user;
    header("Location: dashboard.php");
} else {
    echo "Login gagal";
}
?>

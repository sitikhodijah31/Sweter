<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
?>
<h2>Halo, <?= $_SESSION['user']['name']; ?></h2>
<a href="logout.php">Logout</a>

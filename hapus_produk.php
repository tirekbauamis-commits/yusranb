<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM produk WHERE id_produk=$id");

echo "<script>
        alert('Produk berhasil dihapus!');
        window.location='admin_produk.php';
      </script>";

<?php
$server = "localhost";
$user   = "root";
$pass   = "";
$db     = "yusrabbakery";

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

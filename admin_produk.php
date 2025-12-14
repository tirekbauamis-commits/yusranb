<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

$produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <?php require("../components/head.php") ?>
</head>

<body class="bg-cream text-brownDark">

<!-- HEADER -->
<?php require("../components/header.php") ?>

<!-- HERO -->
<section class="relative h-[40vh] flex items-center justify-center">
    <img src="../image/banner.jpg" class="absolute inset-0 w-full h-full object-cover brightness-50">
    <h1 class="relative text-white text-4xl font-bold">Kelola Produk</h1>
</section>

<section class="max-w-6xl mx-auto py-14 px-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold">Daftar Produk</h2>
        <a href="tambah_produk.php" 
           class="bg-brown text-white px-5 py-3 rounded-lg hover:bg-brownDark transition">
           + Tambah Produk
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
        <table class="w-full table-auto">
            <thead class="bg-brown text-white">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Harga</th>
                    <th class="p-3">Gambar</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($produk as $p) { ?>
                <tr class="border-b hover:bg-cream/50">
                    <td class="p-3"><?= $p['id_produk'] ?></td>
                    <td class="p-3"><?= $p['nama_produk'] ?></td>
                    <td class="p-3">Rp <?= number_format($p['harga'],0,',','.') ?></td>
                    <td class="p-3">
                        <img src="../image/<?= $p['gambar'] ?>" class="w-20 rounded-lg shadow">
                    </td>
                    <td class="p-3">
                        <a href="edit_produk.php?id=<?= $p['id_produk'] ?>" 
                           class="text-blue-600 font-semibold hover:underline">Edit</a> |
                        <a href="hapus_produk.php?id=<?= $p['id_produk'] ?>"
                           onclick="return confirm('Hapus produk?')"
                           class="text-red-600 font-semibold hover:underline">
                           Hapus
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

<?php require("../components/footer.php") ?>

</body>
</html>

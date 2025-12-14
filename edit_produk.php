<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk=$id"));

if (isset($_POST['update'])) {

    $nama = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../image/" . $gambar);
    } else {
        $gambar = $data['gambar'];
    }

    mysqli_query($conn,
        "UPDATE produk SET 
         nama_produk='$nama', 
         deskripsi='$deskripsi',
         harga='$harga',
         gambar='$gambar'
         WHERE id_produk=$id");

    echo "<script>
            alert('Produk berhasil diperbarui!');
            window.location='admin_produk.php';
          </script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <?php require("../components/head.php") ?>
</head>

<body class="bg-cream text-brownDark">

<?php require("../components/header.php") ?>

<section class="relative h-[40vh] flex items-center justify-center">
    <img src="../image/banner.jpg" class="absolute inset-0 w-full h-full object-cover brightness-50">
    <h1 class="relative text-white text-4xl font-bold">Edit Produk</h1>
</section>

<section class="max-w-4xl mx-auto py-14 px-6">

    <div class="bg-white p-8 rounded-2xl shadow-xl">

        <!-- 🔙 TOMBOL KEMBALI -->
        <a href="admin_produk.php"
           class="inline-block mb-6 bg-brownDark text-white px-6 py-2 rounded-lg font-semibold hover:bg-brown transition">
            ⬅ Kembali ke Daftar Produk
        </a>

        <h2 class="text-3xl font-semibold mb-6">Form Edit Produk</h2>

        <form method="POST" enctype="multipart/form-data" class="space-y-5">

            <div>
                <label class="font-semibold">Nama Produk</label>
                <input type="text" name="nama_produk"
                       value="<?= $data['nama_produk'] ?>"
                       class="w-full p-3 border border-brown/40 rounded-lg focus:ring focus:ring-brown/30"
                       required>
            </div>

            <div>
                <label class="font-semibold">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                          class="w-full p-3 border border-brown/40 rounded-lg focus:ring focus:ring-brown/30"
                          required><?= $data['deskripsi'] ?></textarea>
            </div>

            <div>
                <label class="font-semibold">Harga</label>
                <input type="number" name="harga"
                       value="<?= $data['harga'] ?>"
                       class="w-full p-3 border border-brown/40 rounded-lg focus:ring focus:ring-brown/30"
                       required>
            </div>

            <div>
                <label class="font-semibold">Gambar Baru</label>
                <input type="file" name="gambar"
                       class="w-full p-3 border border-brown/40 rounded-lg bg-white">
            </div>

            <p class="font-semibold">Gambar Saat Ini:</p>
            <img src="../image/<?= $data['gambar'] ?>" width="120" class="rounded-lg shadow">

            <button type="submit" name="update"
                    class="bg-brown text-white px-8 py-3 rounded-lg font-semibold hover:bg-brownDark transition">
                Update Produk
            </button>

        </form>

    </div>
</section>

<?php require("../components/footer.php") ?>

</body>
</html>

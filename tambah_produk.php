<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}
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
    <h1 class="relative text-white text-4xl font-bold">Tambah Produk</h1>
</section>

<section class="max-w-4xl mx-auto py-14 px-6">

    <div class="bg-white p-8 rounded-2xl shadow-xl">

        <!-- 🔙 TOMBOL KEMBALI -->
        <a href="admin_produk.php"
           class="inline-block mb-6 bg-brownDark text-white px-6 py-2 rounded-lg font-semibold hover:bg-brown transition">
            ⬅ Kembali ke Daftar Produk
        </a>

        <h2 class="text-3xl font-semibold mb-6">Form Tambah Produk</h2>

        <?php
        if (isset($_POST['simpan'])) {

            $nama = $_POST['nama_produk'];
            $deskripsi = $_POST['deskripsi'];
            $harga = $_POST['harga'];

            $gambar = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];

            move_uploaded_file($tmp, "../image/" . $gambar);

            mysqli_query($conn, "INSERT INTO produk (nama_produk, deskripsi, harga, gambar)
                                 VALUES ('$nama', '$deskripsi', '$harga', '$gambar')");

            echo "<script>
                    alert('Produk berhasil ditambahkan!');
                    window.location='admin_produk.php';
                  </script>";
        }
        ?>

        <form method="POST" enctype="multipart/form-data" class="space-y-5">

            <div>
                <label class="font-semibold">Nama Produk</label>
                <input type="text" name="nama_produk"
                    class="w-full p-3 border border-brown/40 rounded-lg focus:ring focus:ring-brown/30"
                    required>
            </div>

            <div>
                <label class="font-semibold">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                    class="w-full p-3 border border-brown/40 rounded-lg focus:ring focus:ring-brown/30"
                    required></textarea>
            </div>

            <div>
                <label class="font-semibold">Harga</label>
                <input type="number" name="harga"
                    class="w-full p-3 border border-brown/40 rounded-lg focus:ring focus:ring-brown/30"
                    required>
            </div>

            <div>
                <label class="font-semibold">Gambar Produk</label>
                <input type="file" name="gambar"
                    class="w-full p-3 border border-brown/40 rounded-lg bg-white"
                    required>
            </div>

            <button type="submit" name="simpan"
                class="bg-brown text-white px-8 py-3 rounded-lg font-semibold hover:bg-brownDark transition">
                Simpan Produk
            </button>

        </form>
    </div>

</section>

<?php require("../components/footer.php") ?>

</body>
</html>

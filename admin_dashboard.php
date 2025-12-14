<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <?php require("components/head.php"); ?>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Colors -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: "#FFF8E7",
                        brown: "#A47148",
                        brownDark: "#5C3B23"
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>

    <title>Dashboard Admin</title>
</head>

<body class="bg-cream text-brownDark">

    <!-- HEADER -->
    <?php require("components/header.php"); ?>

    <!-- HERO -->
    <section class="relative h-[35vh] flex items-center justify-center">
        <img src="image/banner.jpg" class="absolute inset-0 w-full h-full object-cover brightness-50">
        <h1 class="relative text-white text-4xl font-bold">Dashboard Admin</h1>
    </section>

    <!-- CONTENT -->
    <section class="max-w-5xl mx-auto mt-12 bg-white p-10 rounded-2xl shadow-lg">

        <h2 class="text-3xl font-bold mb-6">
            Selamat datang, <span class="text-brown"><?= $_SESSION['admin'] ?></span>
        </h2>

        <p class="mb-10 text-lg">Silakan pilih menu di bawah untuk mengelola website.</p>

        <div class="grid md:grid-cols-2 gap-8">

            <!-- Kelola Produk -->
            <a href="admin/admin_produk.php"
               class="bg-cream border-2 border-brown/40 p-8 rounded-xl shadow hover:shadow-xl transition text-center">
                <h3 class="text-2xl font-semibold mb-3">Kelola Produk</h3>
                <p>Tambah, edit, atau hapus produk toko.</p>
            </a>

            <!-- Logout -->
            <button onclick="logoutConfirm()"
                class="bg-brownDark text-white p-8 rounded-xl shadow hover:bg-brown transition text-center">
                <h3 class="text-2xl font-semibold mb-3">Logout</h3>
                <p>Keluar dari akun admin.</p>
            </button>

        </div>
    </section>

    <!-- FOOTER -->
    <?php require("components/footer.php"); ?>

    <script>
        function logoutConfirm() {
            if (confirm("Yakin ingin logout?")) {
                window.location.href = "admin/admin_logout.php";
            }
        }
    </script>

</body>

</html>

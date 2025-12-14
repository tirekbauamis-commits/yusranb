<?php
session_start();

if (!isset($_SESSION['user_id']) && !isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Logout</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-[#fff8ef]">

<div class="bg-white p-8 rounded-2xl shadow-xl border border-[#7b4f2b] text-center w-full max-w-sm">

  <h2 class="text-2xl font-bold text-[#5e3b1e] mb-4">
    Konfirmasi Logout
  </h2>

  <p class="text-gray-600 mb-6">
    Apakah kamu yakin ingin logout?
  </p>

  <div class="flex justify-center gap-4">
    <a href="logout_proses.php"
       class="bg-[#7b4f2b] text-white px-6 py-2 rounded-lg hover:bg-[#5e3b1e] transition">
      Iya
    </a>

    <a href="index.php"
       class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
      Batal
    </a>
  </div>

</div>

</body>
</html>

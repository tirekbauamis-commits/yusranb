<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  mysqli_query($conn, "INSERT INTO users VALUES('', '$nama', '$email', '$password')");
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register | Yusran Bakery</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-[#fff8ef]">

<div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-8 border border-[#7b4f2b]">

  <h2 class="text-3xl font-bold text-center text-[#5e3b1e] mb-1">
    Daftar Akun
  </h2>
  <p class="text-center text-gray-600 mb-6">
    Yusran Bakery
  </p>

  <form method="POST">
    <div class="mb-4">
      <label class="block mb-1 font-medium text-[#5e3b1e]">Nama</label>
      <input type="text" name="nama" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#7b4f2b]">
    </div>

    <div class="mb-4">
      <label class="block mb-1 font-medium text-[#5e3b1e]">Email</label>
      <input type="email" name="email" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#7b4f2b]">
    </div>

    <div class="mb-6">
      <label class="block mb-1 font-medium text-[#5e3b1e]">Password</label>
      <input type="password" name="password" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#7b4f2b]">
    </div>

    <button name="register"
      class="w-full bg-[#7b4f2b] text-white py-2 rounded-lg hover:bg-[#5e3b1e] transition font-semibold">
      Daftar
    </button>
  </form>

  <p class="text-center text-sm mt-5">
    Sudah punya akun?
    <a href="login.php" class="text-[#7b4f2b] font-semibold hover:underline">
      Login
    </a>
  </p>
</div>

</body>
</html>

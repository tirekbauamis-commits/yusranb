<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = md5($_POST['password']); // 🔥 INI KUNCI UTAMA

  // ===== USER LOGIN =====
  $qUser = mysqli_query($conn, "
    SELECT * FROM users 
    WHERE (email='$username' OR nama='$username')
    AND password='$password'
  ");

  if (mysqli_num_rows($qUser) === 1) {
    $user = mysqli_fetch_assoc($qUser);

    $_SESSION['user_id']   = $user['id_user'];
    $_SESSION['user_nama'] = $user['nama'];

    header("Location: index.php");
    exit;
  }

  // ===== ADMIN LOGIN =====
  $qAdmin = mysqli_query($conn, "
    SELECT * FROM admin 
    WHERE username='$username'
    AND password='$password'
  ");

  if (mysqli_num_rows($qAdmin) === 1) {
    $_SESSION['admin'] = $username;
    header("Location: admin_dashboard.php");
    exit;
  }

  $error = "Username / Email atau Password salah!";
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | Yusran Bakery</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-[#fff8ef]">

<div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-8 border border-[#7b4f2b]">

  <h2 class="text-3xl font-bold text-center text-[#5e3b1e] mb-1">
    Yusran Bakery
  </h2>
  <p class="text-center text-gray-600 mb-6">
    Silakan login untuk melanjutkan
  </p>

  <?php if (isset($error)) : ?>
    <div class="bg-red-100 text-red-700 p-2 rounded mb-4 text-center">
      <?= $error ?>
    </div>
  <?php endif; ?>

  <form method="POST">
    <div class="mb-4">
      <label class="block mb-1 font-medium text-[#5e3b1e]">
        Username / Email
      </label>
      <input type="text" name="username" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#7b4f2b]">
    </div>

    <div class="mb-6">
      <label class="block mb-1 font-medium text-[#5e3b1e]">
        Password
      </label>
      <input type="password" name="password" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#7b4f2b]">
    </div>

    <button name="login"
      class="w-full bg-[#7b4f2b] text-white py-2 rounded-lg hover:bg-[#5e3b1e] transition font-semibold">
      Login
    </button>
  </form>

  <p class="text-center text-sm mt-5">
    Belum punya akun?
    <a href="register.php" class="text-[#7b4f2b] font-semibold hover:underline">
      Daftar sekarang
    </a>
  </p>

</div>

</body>
</html>

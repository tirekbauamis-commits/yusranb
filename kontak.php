<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>

<?php require("components/head.php") ?>
</head>

<body class="bg-cream text-brownDark">

  <!-- HEADER -->
<?php require("components/header.php") ?>

  <!-- HERO -->
  <section class="relative h-[45vh] flex items-center justify-center">
    <img src="image/banner.jpg" class="absolute inset-0 w-full h-full object-cover brightness-50">
    <h1 class="relative text-white text-4xl font-bold">Hubungi Kami</h1>
  </section>

  <!-- CONTENT -->
  <section class="max-w-6xl mx-auto py-14 grid md:grid-cols-2 gap-10 px-6">

    <!-- Info Kontak -->
    <div>
      <h2 class="text-3xl font-semibold mb-4">Informasi Kontak</h2>
      <p class="mb-3">Silakan hubungi kami jika ada pertanyaan atau ingin melakukan pemesanan.</p>

      <div class="mt-6 space-y-4">
        <p><strong>📍 Alamat:</strong> Jl. Ahmad Yani No. 12, Bandar Lampung</p>
        <p><strong>📞 WhatsApp:</strong> <a href="https://wa.me/6287894590492" class="text-brown font-bold">0878-9459-0492</a></p>
        <p><strong>✉️ Email:</strong> yusranbakery@gmail.com</p>
        <p><strong>🕒 Jam Operasional:</strong> 07:00 – 21:00</p>
      </div>
    </div>

    <!-- Form Kontak -->
    <div class="bg-white p-8 rounded-2xl shadow-lg">
      <h3 class="text-2xl font-semibold mb-6">Kirim Pesan</h3>

      <form action="proses_kontak.php" method="POST" class="space-y-4">

        <input type="text" name="nama" placeholder="Nama lengkap"
          class="w-full p-3 border border-brown/40 rounded-lg focus:ring focus:ring-brown/30" required>

        <input type="email" name="email" placeholder="Email"
          class="w-full p-3 border border-brown/40 rounded-lg focus:ring focus:ring-brown/30" required>

        <textarea name="pesan" rows="4" placeholder="Tulis pesan..."
          class="w-full p-3 border border-brown/40 rounded-lg focus:ring focus:ring-brown/30" required></textarea>

        <button type="submit"
          class="bg-brown text-white px-6 py-3 rounded-lg font-semibold hover:bg-brownDark transition">
          Kirim Pesan
        </button>

      </form>
    </div>

  </section>

  <!-- FOOTER -->
<?php require("components/footer.php") ?>

</body>
</html>

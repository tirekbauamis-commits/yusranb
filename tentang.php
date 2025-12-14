<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Kami - Yusran Bakery</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            cream: '#fff8ef',
            brown: '#7b4f2b',
            brownDark: '#5e3b1e'
          }
        }
      }
    }
  </script>
</head>

<body class="bg-cream text-brownDark">
  
  <!-- HEADER -->
<?php require("components/header.php") ?>

  <!-- HERO -->
  <section class="relative h-[45vh] flex items-center justify-center">
    <img src="image/banner.jpg" class="absolute inset-0 w-full h-full object-cover brightness-50">
    <h1 class="relative text-white text-4xl font-bold">Tentang Kami</h1>
  </section>

  <!-- CONTENT -->
  <section class="max-w-5xl mx-auto bg-white shadow-lg p-8 rounded-2xl mt-10 mb-16">
    <h2 class="text-3xl font-bold mb-5">Yusran Bakery</h2>
    <p class="leading-relaxed mb-4">
      Yusran Bakery berdiri dengan satu tujuan sederhana: menghadirkan roti dan donat segar dengan kualitas terbaik.
      Dengan menggunakan resep turun-temurun serta bahan-bahan berkualitas, kami berkomitmen untuk memberikan rasa terbaik dalam setiap gigitan.
    </p>
    <p class="leading-relaxed mb-4">
      Sejak awal berdiri, kami telah melayani masyarakat Bandar Lampung dengan berbagai produk roti, donat, dan kue.
      Setiap hari kami memproduksi roti segar agar pelanggan dapat menikmati rasa yang lembut, manis, dan khas.
    </p>
    <p class="leading-relaxed mb-4">
      Kami percaya bahwa makanan yang dibuat dengan sepenuh hati akan selalu memberikan kebahagiaan.
      Karena itu, Yusran Bakery terus berinovasi menghadirkan produk-produk baru yang tetap menjaga cita rasa klasik.
    </p>
  </section>

  <!-- FOOTER -->
<?php require("components/footer.php") ?>

</body>
</html>

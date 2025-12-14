<header class="bg-gradient-to-r from-brown to-brownDark text-white shadow-md sticky top-0 z-50">
  <div class="max-w-6xl mx-auto flex justify-between items-center px-6 py-3">

    <!-- LOGO -->
    <div class="flex items-center gap-3">
      <img src="/yusran_bakery/image/logo.jpg" alt="Logo" class="w-10 h-10 rounded-md object-cover">
      <span class="font-semibold text-lg">Yusran Bakery</span>
    </div>

    <!-- NAVBAR -->
    <nav class="relative flex gap-6 font-medium" id="navbar">

      <!-- INDICATOR -->
      <span id="nav-indicator"
        class="absolute -bottom-1 h-1 bg-cream rounded-full transition-all duration-300"></span>

      <a href="/yusran_bakery/index.php" class="nav-link">Home</a>
      <a href="/yusran_bakery/produk.php" class="nav-link">Product</a>
      <a href="/yusran_bakery/tentang.php" class="nav-link">About Us</a>
      <a href="/yusran_bakery/kontak.php" class="nav-link">Contact</a>

      <?php if (isset($_SESSION['admin'])): ?>
        <a href="/yusran_bakery/admin_dashboard.php" class="nav-link">Dashboard</a>
        <a href="/yusran_bakery/logout.php" class="nav-link font-semibold">Logout</a>

      <?php elseif (isset($_SESSION['user_id'])): ?>
        <a href="/yusran_bakery/logout.php" class="nav-link font-semibold">Logout</a>

      <?php else: ?>
        <a href="/yusran_bakery/login.php" class="nav-link">Login</a>
      <?php endif; ?>

    </nav>
  </div>

  <!-- JS NAVBAR (SATU TEMPAT DI HEADER) -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const links = document.querySelectorAll(".nav-link");
      const indicator = document.getElementById("nav-indicator");

      if (!indicator || links.length === 0) return;

      function moveIndicator(el) {
        indicator.style.width = el.offsetWidth + "px";
        indicator.style.left = el.offsetLeft + "px";
      }

      // Set aktif sesuai URL
      let activeLink = links[0];
      links.forEach(link => {
        if (window.location.pathname === new URL(link.href).pathname) {
          activeLink = link;
        }

        // Hover effect
        link.addEventListener("mouseenter", () => moveIndicator(link));
      });

      // Default / active
      moveIndicator(activeLink);
    });
  </script>
</header>

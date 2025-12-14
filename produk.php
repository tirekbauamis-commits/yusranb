<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <?php require("components/head.php") ?>
</head>

<body class="bg-gray-100">

<?php require("components/header.php") ?>

<!-- JUDUL -->
<section class="text-center py-10">
  <h1 class="text-4xl font-bold text-brownDark mb-3">Produk Kami</h1>
  <p class="text-gray-600">Roti & donat segar setiap hari</p>
</section>

<!-- SEARCH BAR -->
<div class="max-w-2xl mx-auto px-3 mb-3">
  <input 
    type="text" 
    id="searchInput"
    placeholder="Cari produk..."
    class="w-full p-3 border border-gray-100 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-brownDark"
  >
</div>

<!-- LIST PRODUK -->
<main id="productList" class="max-w-6xl mx-auto px-6 pb-20 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

<?php
$query = mysqli_query($conn, "SELECT * FROM produk");
if (mysqli_num_rows($query) > 0) {
  while ($row = mysqli_fetch_assoc($query)) {
    echo '
    <div class="product-card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
      <img src="image/'.$row['gambar'].'" class="w-full h-48 object-cover" alt="'.$row['nama_produk'].'">
      <div class="p-4">
        <h2 class="font-semibold text-lg mb-1 text-brownDark">'.$row['nama_produk'].'</h2>
        <p class="text-gray-600 text-sm mb-2">'.$row['deskripsi'].'</p>
        <p class="text-brown font-bold text-lg">Rp '.number_format($row['harga'],0,',','.').'</p>

        <button 
          class="add-to-cart mt-3 w-full bg-brown text-white py-2 rounded-lg hover:bg-brownDark transition"
          data-id="'.$row['id_produk'].'"
          data-name="'.$row['nama_produk'].'"
          data-price="'.$row['harga'].'"
        >Tambah ke Keranjang</button>
      </div>
    </div>';
  }
} else {
  echo "<p class='col-span-full text-center text-gray-600'>Belum ada produk tersedia.</p>";
}
?>

</main>

<!-- SIDEBAR KERANJANG -->
<div id="cartSidebar" class="fixed top-0 right-0 w-80 h-full bg-white shadow-xl p-6 translate-x-full transition-all duration-300 z-50">

  <!-- Panah kembali -->
  <button onclick="toggleCart()" class="flex items-center text-brownDark mb-5">
    <span class="text-2xl mr-2">←</span> Kembali
  </button>

  <h2 class="text-2xl font-bold text-brownDark mb-4">Keranjang Belanja</h2>

  <div id="cart" class="space-y-3 max-h-[60vh] overflow-y-auto"></div>

  <p id="cart-total" class="font-bold text-lg mt-4">Total: Rp 0</p>

  <button onclick="checkoutWA()" class="mt-4 w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
    Checkout via WhatsApp
  </button>
</div>

<!-- TOMBOL KERANJANG KANAN BAWAH -->
<button onclick="toggleCart()" 
  class="fixed bottom-6 right-6 bg-brown text-white px-6 py-3 rounded-full shadow-lg text-lg hover:bg-brownDark transition">
  Keranjang
</button>

<?php require("components/footer.php") ?>

<script>
// === KERANJANG ===
let cart = [];

// === TAMBAH PRODUK ===
document.querySelectorAll('.add-to-cart').forEach(btn => {
  btn.addEventListener('click', () => {
    const id = btn.dataset.id;
    const name = btn.dataset.name;
    const price = parseInt(btn.dataset.price);

    let item = cart.find(p => p.id === id);
    if (item) item.qty++;
    else cart.push({ id, name, price, qty: 1 });

    updateCart();
    openCart();
  });
});

// === UPDATE KERANJANG ===
function updateCart() {
  const cartBox = document.getElementById('cart');
  const totalBox = document.getElementById('cart-total');

  cartBox.innerHTML = '';
  let total = 0;

  cart.forEach(item => {
    const subtotal = item.price * item.qty;
    total += subtotal;

    cartBox.innerHTML += `
      <div class="flex justify-between border-b pb-2">
        <p>${item.name} x ${item.qty}</p>
        <p>Rp ${subtotal}</p>
      </div>
    `;
  });

  totalBox.innerText = 'Total: Rp ' + total.toLocaleString('id-ID');
}

// === BUKA/TUTUP SIDEBAR ===
function toggleCart() {
  document.getElementById('cartSidebar').classList.toggle('translate-x-full');
}

function openCart() {
  document.getElementById('cartSidebar').classList.remove('translate-x-full');
}

// === CHECKOUT WA ===
function checkoutWA() {
  if (cart.length === 0) {
    alert('Keranjang masih kosong!');
    return;
  }

  let msg = 'Halo, saya mau pesan:%0A';
  let total = 0;

  cart.forEach(item => {
    msg += `- ${item.name} x ${item.qty} = Rp ${item.price * item.qty}%0A`;
    total += item.price * item.qty;
  });

  msg += `%0ATotal: Rp ${total.toLocaleString('id-ID')}`;

  window.open('https://wa.me/6287894590492?text=' + msg, '_blank');
}

// === FITUR SEARCH ===
document.getElementById("searchInput").addEventListener("input", function () {
  const filter = this.value.toLowerCase();
  document.querySelectorAll(".product-card").forEach(card => {
    let name = card.querySelector("h2").innerText.toLowerCase();
    card.style.display = name.includes(filter) ? "block" : "none";
  });
});
</script>

</body>
</html>

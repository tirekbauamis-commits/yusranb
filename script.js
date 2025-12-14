document.addEventListener("DOMContentLoaded", function() {

    // =============================
    // FADE-IN PRODUK SAAT DI SCROLL
    // =============================
    const cards = document.querySelectorAll("main > div");

    function fadeInOnScroll() {
        const triggerBottom = window.innerHeight * 0.85;
        cards.forEach((card) => {
            const boxTop = card.getBoundingClientRect().top;
            if (boxTop < triggerBottom) {
                card.classList.add("opacity-100", "translate-y-0");
            } else {
                card.classList.remove("opacity-100", "translate-y-0");
            }
        });
    }

    window.addEventListener("scroll", fadeInOnScroll);
    fadeInOnScroll();



    // =============================
    // SEARCH BAR OTOMATIS
    // =============================
    const searchSection = document.querySelector("section");

    if (searchSection) {
        const searchInput = document.createElement("input");
        searchInput.placeholder = "Cari produk...";
        searchInput.className =
            "block w-full max-w-md mx-auto mb-10 p-2 border border-brown/40 rounded-lg focus:ring focus:ring-brown/20";

        searchSection.insertBefore(searchInput, searchSection.firstChild);

        searchInput.addEventListener("keyup", function() {
            const filter = this.value.toLowerCase();
            cards.forEach((card) => {
                const name = card.querySelector("h2").textContent.toLowerCase();
                card.style.display = name.includes(filter) ? "" : "none";
            });
        });
    }



    // =============================
    // EFEK HOVER CARD
    // =============================
    cards.forEach((card) => {
        card.addEventListener("mouseenter", () => {
            card.style.transform = "scale(1.03)";
            card.style.transition = "transform 0.25s ease";
        });
        card.addEventListener("mouseleave", () => {
            card.style.transform = "scale(1)";
        });
    });



    // =============================
    // SCROLL KE ATAS BUTTON
    // =============================
    const scrollBtn = document.createElement("button");
    scrollBtn.textContent = "↑";
    scrollBtn.className =
        "fixed bottom-6 right-6 bg-brown text-cream text-2xl px-4 py-2 rounded-full shadow-lg opacity-0 transition-opacity";
    document.body.appendChild(scrollBtn);

    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            scrollBtn.classList.remove("opacity-0");
            scrollBtn.classList.add("opacity-100");
        } else {
            scrollBtn.classList.add("opacity-0");
            scrollBtn.classList.remove("opacity-100");
        }
    });

    scrollBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });



    // =============================
    // MODAL POPUP GAMBAR PRODUK
    // =============================
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modalImg");
    const closeModal = document.getElementById("closeModal");

    const images = document.querySelectorAll(".popup-img");

    images.forEach(img => {
        img.addEventListener("click", () => {
            modalImg.src = img.src;
            modal.classList.remove("opacity-0", "pointer-events-none");
            modal.classList.add("opacity-100");
        });
    });

    closeModal.addEventListener("click", () => {
        modal.classList.add("opacity-0", "pointer-events-none");
        modal.classList.remove("opacity-100");
    });

    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.classList.add("opacity-0", "pointer-events-none");
            modal.classList.remove("opacity-100");
        }
    });

});
const menuToggle = document.getElementById("menu-toggle");
const menu = document.getElementById("menu");

menuToggle.addEventListener("click", () => {
    menu.classList.toggle("hidden");
});

const slides = document.querySelectorAll(".hs-carousel-slide");
const carouselBody = document.querySelector(".hs-carousel-body");

function updateActiveSlide() {
    const centerIndex = Math.floor(slides.length / 2);
    slides.forEach((slide, index) => {
        if (index === centerIndex) {
            slide.classList.add("active");
        } else {
            slide.classList.remove("active");
        }
    });
}

// Optional: Sync carousel's navigation
document.querySelector(".hs-carousel-prev").addEventListener("click", () => {
    const currentIndex = Array.from(slides).findIndex((slide) =>
        slide.classList.contains("active")
    );
    if (currentIndex > 0) {
        slides[currentIndex].classList.remove("active");
        slides[currentIndex - 1].classList.add("active");
    }
});

document.querySelector(".hs-carousel-next").addEventListener("click", () => {
    const currentIndex = Array.from(slides).findIndex((slide) =>
        slide.classList.contains("active")
    );
    if (currentIndex < slides.length - 1) {
        slides[currentIndex].classList.remove("active");
        slides[currentIndex + 1].classList.add("active");
    }
});

// Initial update of active slide
updateActiveSlide();

document
    .getElementById("selection-form")
    .addEventListener("submit", function (e) {
        const selectedCategory = document.querySelector(
            'input[name="category"]:checked'
        );
        if (!selectedCategory) {
            e.preventDefault();
            alert("Silakan pilih kategori terlebih dahulu.");
        } else {
            // Dynamically set the action URL based on selection
            if (selectedCategory.value === "mandiri") {
                this.action = "/registrasi-kategori/mandiri";
            } else if (selectedCategory.value === "kelompok") {
                this.action = "/registrasi-kategori/kelompok";
            }
        }
    });

function goBack() {
    window.history.back();
}

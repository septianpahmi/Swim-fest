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

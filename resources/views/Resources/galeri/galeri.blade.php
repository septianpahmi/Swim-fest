<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeri</title>
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        nav {
            background-color: #023f5b;
            padding: 1rem 2rem;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 1rem;
            margin: 0;
            padding: 0;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        nav ul li a:hover {
            background-color: #0369a1;
        }

        .carousel {
            position: relative;
            overflow: hidden;
            max-width: 100%;
            margin: 2rem auto;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item {
            flex: 0 0 auto;
            width: 200px;
            height: 200px;
            margin: 0 10px;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .carousel-buttons {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .carousel-buttons button {
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            border-radius: 50%;
        }

        .carousel-buttons button:hover {
            background-color: rgba(255, 255, 255, 1);
        }

        .content {
            text-align: center;
            padding: 2rem;
        }

        .content h3 {
            font-size: 2rem;
            color: #023f5b;
            margin-bottom: 1rem;
        }

        .content p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            padding: 2rem;
        }

        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <nav class="flex justify-between items-center py-4 px-6 bg-[#023f5b] shadow-md">
        <!-- Logo -->
        <div class="flex items-center">
            <img src="/image/logo/logo-white.png" alt="Logo" class="h-10 mr-2">
        </div>

        <!-- Hamburger Menu (Tombol di Mobile) -->
        <div class="md:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <!-- Ikon Hamburger -->
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Menu Items -->
        <ul id="menu"
            class="hidden md:flex md:space-x-6 md:ml-auto absolute md:static top-16 left-0 w-full md:w-auto bg-[#023f5b] md:bg-transparent shadow-md md:shadow-none">
            <li>
                <a href="{{ route('beranda') }}" class="block py-2 px-4 text-white hover:text-teal-600 ">Beranda</a>
            </li>
            <li>
                <a href="{{ route('perlombaan') }}" class="block py-2 px-4 text-white hover:text-teal-600">Turnamen</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 text-white hover:text-teal-600">Berita</a>
            </li>
            <li>
                <a href="{{ route('galeri') }}"
                    class="block py-2 px-4 text-white hover:text-teal-600 border-b-2 border-white">Galeri</a>
            </li>
            <li>
                <a href="/tentang" class="block py-2 px-4 text-white hover:text-teal-600">Tentang</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 text-white hover:text-teal-600">Login</a>
            </li>
            <li>
                <a href="#"
                    class="block py-2 px-4 text-white bg-red-400 rounded-md text-center hover:bg-red-500 md:inline-block md:ml-4">
                    Daftar Sekarang
                </a>
            </li>
        </ul>
    </nav>
    <section class="bg-white text-gray-800 p-6">
        <div class="relative container mx-auto items-center px-6 mt-6 md:px-20 min-h-screen z-10">

            <section class="carousel">
                <div class="carousel-buttons">
                    <button class="mr-4" id="prev">&#9664;</button>
                    <button class="ml-4" id="next">&#9654;</button>
                </div>
                <div class="carousel-track">
                    <div class="carousel-item">
                        <img src="image/i1.png" alt="Swimmer 1">
                    </div>
                    <div class="carousel-item">
                        <img src="image/i2.png" alt="Swimmer 2">
                    </div>
                    <div class="carousel-item">
                        <img src="image/i3.png" alt="Swimmer 3">
                    </div>
                    <div class="carousel-item">
                        <img src="image/i4.png" alt="Swimmer 4">
                    </div>
                    <div class="carousel-item">
                        <img src="image/i5.png" alt="Swimmer 5">
                    </div>
                </div>
            </section>

            <div class="mb-8 mt-8">
                <h3 class="text-2xl mb-2 font-bold text-[#023f5b]">Aqua Velocity Championship 2025</h3>
                <p class="text-gray-600 leading-loose">
                    Jakarta, 11 Desember 2024-Aqua Blaze National Swimming 2024 resmi dimulai hari ini di Stadion
                    Akuatik Gelora Bung Karno. Turnamen yang menjadi panggung bagi perenang muda berbakat dari seluruh
                    penjuru Indonesia ini menarik perhatian banyak penggemar olahraga air.
                    <br>
                    Event ini mengelompokkan peserta dalam berbagai kategori usia, mulai dari anak-anak hingga dewasa,
                    dan mempertandingkan semua gaya renang, termasuk gaya bebas, dada, punggung, dan kupu-kupu. Hari
                    pertama turnamen dipenuhi sorakan penonton yang menyaksikan ketegangan setiap babak penyisihan.
                </p>
            </div>

            <div class="grid gap-4 grid-cols-3 mb-12 mt-8">
                <div><img src="image/i1.png" alt=""></div>
                <div><img src="image/i2.png" alt=""></div>
                <div><img src="image/i3.png" alt=""></div>
                <div><img src="image/i4.png" alt=""></div>
                <div><img src="image/i5.png" alt=""></div>
                <div><img src="image/i6.png" alt=""></div>
                <div><img src="image/i7.png" alt=""></div>
                <div><img src="image/i8.png" alt=""></div>
                <div><img src="image/i9.png" alt=""></div>
            </div>
        </div>
    </section>


    @include('Partials.footer')

    <script>
        const track = document.querySelector('.carousel-track');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        let index = 0;

        const updateCarousel = () => {
            const offset = -index * 220;
            track.style.transform = `translateX(${offset}px)`;
        };

        nextButton.addEventListener('click', () => {
            index = (index + 1) % track.children.length;
            updateCarousel();
        });

        prevButton.addEventListener('click', () => {
            index = (index - 1 + track.children.length) % track.children.length;
            updateCarousel();
        });

        setInterval(() => {
            index = (index + 1) % track.children.length;
            updateCarousel();
        }, 3000);
    </script>
</body>

</html>

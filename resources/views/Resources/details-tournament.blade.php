<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Tournament</title>
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
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
                <a href="#" class="block py-2 px-4 text-white hover:text-teal-600 ">Beranda</a>
            </li>
            <li>
                <a href="#"
                    class="block py-2 px-4 text-white hover:text-teal-600 border-b-2 border-white">Turnamen</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 text-white hover:text-teal-600">Berita</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 text-white hover:text-teal-600">Galeri</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 text-white hover:text-teal-600">Tentang</a>
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
        <div class="hidden md:block flex top-6 px-12 py-6 mb-6">
            <a href="#" class="text-[#023f5b]">
                <img src="/image/icon/ArrowLeft.png" alt="">
            </a>
        </div>
        <!-- Container -->
        <div class="container mx-auto justify-center md:flex md:flex-wrap lg:flex-nowrap gap-8 mb-6">
            <!-- Left Content: Image and Buttons -->
            <div class="rounded-lg">
                <!-- Image -->
                <div class="mb-6">
                    <img src="/image/image-250.png" alt="Trieste Estate" class="rounded-lg w-full shadow-lg">
                </div>
                <!-- Buttons -->
                <button
                    class="w-full flex items-center justify-between px-4 border border-[#023f5b] text-[#023f5b] font-medium py-3 mb-4 rounded-md hover:bg-[#023f5b] hover:text-white transition">
                    <span><i class="fas fa-certificate"></i> Unduh Sertifikat</span>
                </button>
                <button
                    class="w-full flex items-center justify-between px-4 border border-[#023f5b] text-[#023f5b] font-medium py-3 rounded-md hover:bg-[#023f5b] hover:text-white transition">
                    <span><i class="fas fa-images"></i> Unduh Foto dan Video Perlombaan</span>
                </button>

            </div>
            <hr class="md:hidden border border-b-2 mb-4">
            <!-- Right Content: Event Details -->
            <div class="w-full lg:w-2/3 space-y-6">
                <!-- Header -->
                <h1 class="text-3xl font-bold text-[#023f5b]">Aqua Blaze National Swimming 2024</h1>
                <hr class="border border-b-0 mt-4">
                <div class="text-lg font-medium text-gray-500 border-b border-gray-200 mb-2 w-full">
                    <ul class="flex flex-wrap -mb-px ">
                        <li class="me-2 flex-1 text-center">
                            <a href="#"
                                class="w-full inline-block p-4 border-b-2 rounded-t-lg text-[#023f5b] border-[#023f5b] hover:text-blue-600 hover:border-blue-600 active">Detail
                                Perlombaan</a>
                        </li>
                        <li class="me-2 flex-1 text-center">
                            <a href="#"
                                class="w-full inline-block p-4 border-transparent border-b-2 hover:text-gray-600  rounded-t-lg"
                                aria-current="page">Highlight Perlombaan</a>
                        </li>
                    </ul>
                </div>
                <hr class="md:hidden border border-b-2 mb-4">
                <!-- Event Information -->
                <div class="text-[#023f5b] space-y-4 text-lg">
                    <div class="md:flex gap-4">
                        <span>
                            <img src="/image/icon/calendar-dots0.svg" class="mr-1 md:mr-2" alt="">
                        </span>
                        <span class="flex font-bold">
                            Tanggal
                        </span>
                        <span class="md:ml-20">12 Desember, 2024 - 13 Desember, 2025</span>
                    </div>
                    <hr class="border border-b-0 mb-4">
                    <div class="md:flex gap-4">
                        <span>
                            <img src="/image/icon/person-simple-swim0.svg" class="mr-1 md:mr-2" alt="">
                        </span>
                        <span class="font-bold">
                            Kelas
                        </span>
                        <ul class="md:ml-24">
                            <li>SD Kelas 1 : 50 Meter Gaya Dada Putra</li>
                            <li>SD Kelas 1 : 100 Meter Gaya Bebas Putra</li>
                            <li>SD Kelas 2 : 50 Meter Gaya Dada Putri</li>
                            <li>SD Kelas 2 : 100 Meter Gaya Bebas Putri</li>
                        </ul>
                    </div>
                    <hr class="border border-b-0 mb-4">

                    <div class="md:flex gap-4">
                        <span>
                            <img src="/image/icon/map-pin-simple-line0.svg" class="mr-1 md:mr-2" alt="">
                        </span>
                        <span class="font-bold">
                            Lokasi
                        </span>
                        <ul class="md:ml-24">
                            <a href="#" class="text-blue-500 hover:underline ">Stadion Akuatik Gelora Bung
                                Karno</a>
                        </ul>
                    </div>
                    <hr class="border border-b-0 mb-4">
                </div>
                <hr class="md:hidden border border-b-2 mb-4">
                <!-- Description -->
                <div>
                    <h2 class="text-xl font-bold mb-2 text-gray-900">Deskripsi</h2>
                    <p class="text-gray-800 text-lg leading-relaxed">
                        Aqua Blaze National Swimming 2024 adalah turnamen renang nasional yang mempertemukan perenang
                        terbaik dari berbagai kategori usia, mulai dari anak-anak hingga dewasa. Event ini dirancang
                        untuk mengasah kemampuan atlet dan menjalin solidaritas antar komunitas renang di seluruh
                        Indonesia.
                    </p>
                </div>
                <hr class="md:hidden border border-b-2 mb-4">
                <!-- Registration Steps -->
                <div>
                    <h2 class="text-xl font-bold mb-2 text-gray-900">Cara Pendaftaran:</h2>
                    <ol class="list-decimal ml-5 space-y-1 text-gray-800 text-lg">
                        <li>Kunjungi website resmi Aqua Blaze di <a href="#"
                                class="text-blue-500 hover:underline">www.aquablazenationalswim.com</a></li>
                        <li>Klik menu "Daftar Sekarang" dan isi formulir pendaftaran online.</li>
                        <li>Upload dokumen yang diperlukan, seperti:
                            <ul class="list-disc ml-6">
                                <li>Sertifikat kesehatan</li>
                                <li>Kartu Identitas (KTP/Kartu Pelajar)</li>
                                <li>Pas foto ukuran 3x4</li>
                            </ul>
                        </li>
                        <li>Pilih kategori lomba dan bayar biaya pendaftaran melalui metode yang tersedia.</li>
                        <li>Konfirmasi pendaftaran Anda via email maksimal 1x24 jam.</li>
                    </ol>
                </div>
                <hr class="md:hidden border border-b-2 mb-4">
                <!-- Event Location -->
                <div>
                    <h2 class="text-xl font-bold mb-2 text-gray-900">Alamat Lokasi Event:</h2>
                    <p class="text-gray-800 text-lg">
                        Stadion Akuatik Gelora Bung Karno <br>
                        Jl. Pintu Satu Senayan, Jakarta Pusat, DKI Jakarta
                    </p>
                </div>
                <hr class="md:hidden border border-b-2 mb-4">
                <!-- General Information -->
                <div>
                    <h2 class="text-xl font-bold mb-2 text-gray-900">Informasi Event Renang Secara Umum:</h2>
                    <ul class="list-disc ml-5 space-y-1 text-gray-800 text-lg">
                        <li>Renang adalah olahraga yang menggabungkan kekuatan, teknik, dan ketahanan fisik.</li>
                        <li>Turnamen ini melibatkan berbagai gaya seperti gaya bebas, gaya dada, punggung, dan
                            kupu-kupu.</li>
                        <li>Peserta bersaing untuk mencetak waktu terbaik di setiap kategori usia.</li>
                        <li>Event ini mendukung perkembangan atlet renang di Indonesia.</li>
                    </ul>
                </div>
                <hr class="md:hidden border border-b-2 mb-4">
                <!-- Dokumentasi -->
                <div class="hidden md:block">
                    <h2 class="text-xl font-bold mb-4 text-gray-900 ">Dokumentasi Foto & Video</h2>
                    <div class="flex flex-wrap gap-4">
                        <div class="rounded-lg overflow-hidden shadow-md">
                            <img src="/image/image 30.png" alt="Foto 1" class="w-[155px] h-[193px] object-cover">
                        </div>
                        <div class="rounded-lg overflow-hidden shadow-md">
                            <img src="/image/image 31.png" alt="Foto 2" class="w-[155px] h-[193px] object-cover">
                        </div>
                        <div class="rounded-lg overflow-hidden shadow-md">
                            <img src="/image/image 32.png" alt="Foto 3" class="w-[155px] h-[193px] object-cover">
                        </div>
                        <div class="relative rounded-lg overflow-hidden shadow-md">
                            <img src="/image/image 33.png" alt="Foto 4" class="w-[155px] h-[193px] object-cover">
                            <a href="#"
                                class="absolute inset-0 bg-[#036E9F] bg-opacity-50 flex flex-col items-center justify-center text-white text-sm font-medium hover:bg-[#023f5b] hover:bg-opacity-70 transition">
                                <i class="fas fa-lock mb-1"></i>
                                <span>+106</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @include('Partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.js"></script>
    <script src="/js/style.js"></script>
</body>

</html>

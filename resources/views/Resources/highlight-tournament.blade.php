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
                <a href="{{ route('beranda') }}" class="block py-2 px-4 text-white hover:text-teal-600 ">Beranda</a>
            </li>
            <li>
                <a href="{{ route('perlombaan') }}"
                    class="block py-2 px-4 text-white hover:text-teal-600 border-b-2 border-white">Turnamen</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 text-white hover:text-teal-600">Berita</a>
            </li>
            <li>
                <a href="{{ route('galeri') }}" class="block py-2 px-4 text-white hover:text-teal-600">Galeri</a>
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
        <div class="hidden md:block flex top-6 px-12 py-6 mb-6">
            <a href="javascript:history.back()" class="text-[#023f5b]">
                <img src="/image/icon/ArrowLeft.png" alt="">
            </a>
        </div>
        <!-- Container -->
        <div class="container mx-auto justify-center md:flex md:flex-wrap lg:flex-nowrap gap-8">
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

            <!-- Right Content: Event Details -->
            <div class="w-full lg:w-2/3 space-y-6">
                <!-- Header -->
                <h1 class="text-3xl font-bold text-[#023f5b]">Aqua Blaze National Swimming 2024</h1>
                <hr class="border border-b-0 mt-4">
                <div class="text-lg font-medium text-gray-500 border-b border-gray-200 mb-2 w-full">
                    <ul class="flex flex-wrap -mb-px ">
                        <li class="me-2 flex-1 text-center">
                            <a href="javascript:history.back()"
                                class="w-full inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600">Detail
                                Perlombaan
                            </a>
                        </li>
                        <li class="me-2 flex-1 text-center">
                            <a href="#"
                                class="w-full inline-block p-4 text-[#023f5b] border-[#023f5b] border-b-2 hover:border-blue-600 hover:text-blue-600 rounded-t-lg active"
                                aria-current="page">Highlight Perlombaan</a>
                        </li>
                    </ul>
                </div>
                <hr class="border border-b-0 mb-2">
                <!-- Tabel 1 -->
                <div class="overflow-x-auto mb-6 w-full rounded-lg">
                    <table class="w-full text-left">
                        <thead class="bg-gray-200 text-gray-600 text-sm uppercase">
                            <tr>
                                <th class="px-6 py-3">Kategori Gaya Dada Putra</th>
                                <th class="px-6 py-3">Rank</th>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Waktu (Detik)</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm bg-gray-100">
                            <tr class="border-b">
                                <td class="px-6 py-4 text-red-500">50 Meter Gaya Dada Putra</td>
                                <td class="px-6 py-4 text-red-500">1</td>
                                <td class="px-6 py-4 text-red-500">Arya Pratama</td>
                                <td class="px-6 py-4 text-red-500">30.5</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">50 Meter Gaya Dada Putra</td>
                                <td class="px-6 py-4">2</td>
                                <td class="px-6 py-4">Dimas Saputra</td>
                                <td class="px-6 py-4">31.2</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">100 Meter Gaya Bebas Putra</td>
                                <td class="px-6 py-4">3</td>
                                <td class="px-6 py-4">Bima Akbar</td>
                                <td class="px-6 py-4">55.1</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">100 Meter Gaya Bebas Putra</td>
                                <td class="px-6 py-4">4</td>
                                <td class="px-6 py-4">Raka Alamsyah</td>
                                <td class="px-6 py-4">56.8</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">50 Meter Gaya Dada Putri</td>
                                <td class="px-6 py-4">5</td>
                                <td class="px-6 py-4">Nadia Salsabila</td>
                                <td class="px-6 py-4">35.3</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">50 Meter Gaya Dada Putri</td>
                                <td class="px-6 py-4">6</td>
                                <td class="px-6 py-4">Tiara Putri</td>
                                <td class="px-6 py-4">36.5</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">100 Meter Gaya Bebas Putri</td>
                                <td class="px-6 py-4">7</td>
                                <td class="px-6 py-4">Clara Wijaya</td>
                                <td class="px-6 py-4">59.8</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">100 Meter Gaya Bebas Putri</td>
                                <td class="px-6 py-4">8</td>
                                <td class="px-6 py-4">Selma Dewi</td>
                                <td class="px-6 py-4">61.2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Tabel 2 -->
                <div class="overflow-x-auto mb-6 w-full rounded-lg">
                    <table class="w-full text-left">
                        <thead class="bg-gray-200 text-gray-600 text-sm uppercase">
                            <tr>
                                <th class="px-6 py-3">Kategori Gaya Bebas Putra</th>
                                <th class="px-6 py-3">Rank</th>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Waktu (Detik)</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm bg-gray-100">
                            <tr class="border-b">
                                <td class="px-6 py-4">50 Meter Gaya Dada Putra</td>
                                <td class="px-6 py-4 text-red-500">1</td>
                                <td class="px-6 py-4 text-red-500">Arya Pratama</td>
                                <td class="px-6 py-4 text-red-500">30.5</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">50 Meter Gaya Dada Putra</td>
                                <td class="px-6 py-4">2</td>
                                <td class="px-6 py-4">Dimas Saputra</td>
                                <td class="px-6 py-4">31.2</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">100 Meter Gaya Bebas Putra</td>
                                <td class="px-6 py-4">3</td>
                                <td class="px-6 py-4">Bima Akbar</td>
                                <td class="px-6 py-4">55.1</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">100 Meter Gaya Bebas Putra</td>
                                <td class="px-6 py-4">4</td>
                                <td class="px-6 py-4">Raka Alamsyah</td>
                                <td class="px-6 py-4">56.8</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">50 Meter Gaya Dada Putri</td>
                                <td class="px-6 py-4">5</td>
                                <td class="px-6 py-4">Nadia Salsabila</td>
                                <td class="px-6 py-4">35.3</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">50 Meter Gaya Dada Putri</td>
                                <td class="px-6 py-4">6</td>
                                <td class="px-6 py-4">Tiara Putri</td>
                                <td class="px-6 py-4">36.5</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">100 Meter Gaya Bebas Putri</td>
                                <td class="px-6 py-4">7</td>
                                <td class="px-6 py-4">Clara Wijaya</td>
                                <td class="px-6 py-4">59.8</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">100 Meter Gaya Bebas Putri</td>
                                <td class="px-6 py-4">8</td>
                                <td class="px-6 py-4">Selma Dewi</td>
                                <td class="px-6 py-4">61.2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.js"></script>
    <script src="/js/style.js"></script>
    @include('Partials.footer')
</body>

</html>

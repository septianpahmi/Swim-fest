<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
    <section class="relative bg-[#DAF3FF] overflow-hidden h-screen">
        <div class="relative container mx-auto py-12 px-6 md:px-20 h-full z-10">
            <div class="flex justify-center py-6">
                <h1 class="text-3xl font-bold text-[#023f5b]">PENDAFTARAN</h1>
            </div>

            <div class="relative max-w-5xl mx-auto h-auto bg-white rounded-lg shadow-lg py-12 px-12">
                <!-- Detail Pendaftaran -->
                <div class="w-full">
                    <h3 class="text-lg text-[#023f5b] font-bold mb-2">Pendaftaran</h3>
                    <h2 class="text-3xl font-bold text-[#023f5b] mb-8">Aqua Blaze National Swimming 2024</h2>
                    <hr>
                    <!-- Tipe Pendaftaran -->
                    <div class="mb-8 pt-8">
                        <h2 class="text-2xl text-[#023f5b] font-semibold mb-4">Tipe Pendaftaran</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Card Mandiri -->
                            <div
                                class="flex flex-col items-start border-2 border-[#023f5b] rounded-lg p-4 text-[#023f5b] hover:text-white cursor-pointer hover:bg-[#023f5b]">
                                <div class="flex items-center ">
                                    <span class="inline-block rounded-full p-2 mr-3">
                                        <!-- Icon User -->
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <h3 class="font-bold ">Mandiri</h3>
                                </div>
                                <p class="text-sm ml-10">Lorem ipsum dolor sit amet consectetur.</p>
                            </div>


                            <!-- Card Kelompok -->
                            <div
                                class="flex flex-col items-start border-2 border-[#023f5b] text-[#023f5b] hover:text-white rounded-lg p-4 cursor-pointer hover:bg-[#023f5b]">
                                <div class="flex items-center">
                                    <span class="inline-block rounded-full p-2 mr-3">
                                        <!-- Icon Users -->
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <h3 class="font-bold">Kelompok</h3>
                                </div>
                                <p class="text-sm ml-12">Lorem ipsum dolor sit amet consectetur.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Button Selanjutnya -->
                    <button
                        class="block w-full py-3 px-6 text-white bg-red-500 rounded-lg text-center font-semibold hover:bg-red-600 mt-20">
                        Selanjutnya
                    </button>
                </div>
            </div>
        </div>
    </section>
    @include('Partials.footer')

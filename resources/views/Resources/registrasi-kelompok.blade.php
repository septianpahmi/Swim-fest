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
    <section class="relative bg-[#DAF3FF] overflow-hidden min-h-screen">
        <div class="relative container mx-auto py-12 px-6 md:px-20 z-10">
            <div class="flex justify-center py-6">
                <h1 class="text-3xl font-bold text-[#023f5b]">PENDAFTARAN</h1>
            </div>

            <div class="relative container max-w-5xl mx-auto bg-white rounded-lg shadow-lg py-12 px-12">
                <!-- Detail Pendaftaran -->
                <div class="w-full">
                    <h3 class="text-lg text-[#023f5b] font-bold mb-2">Pendaftaran Kelompok</h3>
                    <h2 class="text-3xl font-bold text-[#023f5b] mb-8">Aqua Blaze National Swimming 2024</h2>
                    <hr>
                    <!-- Tipe Pendaftaran -->
                    <div class="mb-8 pt-8">
                        <h2 class="text-2xl text-[#023f5b] font-semibold mb-4">Informasi Pribadi</h2>
                        <div class="grid  gap-4">
                            <!-- Card Mandiri -->
                            <div
                                class="items-start border-2 border-[#023f5b] rounded-lg p-4 text-[#023f5b] hover:text-white cursor-pointer hover:bg-[#023f5b]">
                                <div class="flex items-center ">
                                    <span class="inline-block rounded-full p-1 mr-3">
                                        <!-- Icon User -->
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <h3 class="font-bold ">Peserta 1</h3>
                                </div>
                                <p class="text-sm ml-9">Lorem ipsum dolor sit amet consectetur.</p>
                            </div>
                            <!-- Card Kelompok -->
                            <div
                                class="items-start border-2 border-[#023f5b] text-[#023f5b] hover:text-white rounded-lg p-4 cursor-pointer hover:bg-[#023f5b]">
                                <div class="flex items-center">
                                    <span class="inline-block rounded-full p-1 mr-3">
                                        <!-- Icon Users -->
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <h3 class="font-bold">Peserta 2</h3>
                                </div>
                                <p class="text-sm ml-9">Lorem ipsum dolor sit amet consectetur.</p>
                            </div>
                            <div
                                class="items-start border-2 border-[#023f5b] text-[#023f5b] hover:text-white rounded-lg p-4 cursor-pointer hover:bg-[#023f5b]">
                                <div class="flex items-center justify-center">
                                    <span class="inline-block rounded-full p-1">
                                        <!-- Icon Users -->
                                        <i class="fas fa-user-plus"></i>
                                    </span>
                                    <h3 class="font-bold">Tambah Peserta</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button Selanjutnya -->
                    <div class="flex flex-col sm:flex-row justify-between mt-20">
                        <button
                            class="py-3 px-6 text-gray-400 border border-gray-400 rounded-lg text-center font-semibold hover:text-white hover:bg-gray-500 sm:w-48 w-full mb-4 sm:mb-0 sm:mr-8">
                            Kembali
                        </button>
                        <button
                            class="py-3 px-6 text-white bg-red-500 rounded-lg text-center font-semibold hover:bg-red-600 sm:w-48 md:w-full">
                            Selanjutnya
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @include('Partials.footer')

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

        <div class="relative container mx-auto py-12 px-6 md:px-20 h-full z-10">
            <div class="flex justify-center py-6">
                <h1 class="text-3xl font-bold text-[#023f5b]">PENDAFTARAN</h1>
            </div>

            <div class="relative max-w-4xl mx-auto bg-white rounded-2xl shadow-lg py-8 px-8">
                <!-- Header Form -->
                <div class="w-full mb-8">
                    <h3 class="text-lg font-bold text-[#023f5b] mb-2">
                        Pendaftaran Mandiri
                    </h3>
                    <h2 class="text-3xl font-bold text-[#023f5b]">
                        Aqua Blaze National Swimming 2024
                    </h2>
                </div>
                <hr class="border border-b-0 mb-8">
                <!-- Form Fields -->
                <div class="space-y-4">
                    <!-- Nama -->
                    <div class="mb-3">
                        <p class="text-sm font-medium text-[#023f5b]">Nama</p>
                        <p class="text-gray-500">Jhon Doe Pamungkas</p>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-3">
                        <p class="text-sm font-medium text-[#023f5b]">Jenis Kelamin</p>
                        <p class="text-gray-500">Laki-laki</p>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="mb-3">
                        <p class="text-sm font-medium text-[#023f5b]">Tanggal Lahir</p>
                        <p class="text-gray-500">19/12/2006</p>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <p class="text-sm font-medium text-[#023f5b]">Alamat</p>
                        <p class="text-gray-500">
                            Kp. Pasir Sarongge Campaka, Pacet, Cianjur, Jawa Barat 43281
                        </p>
                    </div>

                    <!-- Asal Sekolah -->
                    <div class="mb-3">
                        <p class="text-sm font-medium text-[#023f5b]">Asal Sekolah</p>
                        <p class="text-gray-500">SDN Pasir Sarongge</p>
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <p class="text-sm font-medium text-[#023f5b]">Email</p>
                        <p class="text-gray-500">jhon@gmail.com</p>
                    </div>
                </div>
                <hr class="border border-b-0 mb-6">
                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row justify-between">
                    <button
                        class="py-3 px-6 text-gray-400 border border-gray-400 rounded-lg text-center font-semibold hover:text-white hover:bg-gray-500 sm:w-48 w-full mb-4 sm:mb-0 sm:mr-8">
                        Kembali
                    </button>
                    <button
                        class="py-3 px-6 text-white bg-red-500 rounded-lg text-center font-semibold hover:bg-red-600 sm:w-48 md:w-full">
                        PEMBAYARAN
                    </button>
                </div>
            </div>
        </div>
    </section>
    @include('Partials.footer')

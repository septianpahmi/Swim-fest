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
                        Pendaftaran Kelompok
                    </h3>
                    <h2 class="text-3xl font-bold text-[#023f5b]">
                        Aqua Blaze National Swimming 2024
                    </h2>
                </div>
                <hr class="border border-b-0 mb-8">
                <h3 class="text-2xl font-semibold text-[#023f5b] mb-6">
                    Informasi Pribadi
                </h3>
                <!-- Form Section -->
                <form class="space-y-6">
                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-800">Nama</label>
                        <input type="text" placeholder="Taufik Hidayat" id="nama"
                            class="mt-1 font-semibold p-3 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800 mb-1">Jenis Kelamin</label>
                        <div class="flex flex-row space-x-4">
                            <div class="basis-1/2 flex items-center border border-gray-300 rounded-lg p-3">
                                <input type="radio" id="laki-laki" name="gender"
                                    class="h-4 w-4 text-blue-600  rounded-full focus:ring-blue-500">
                                <label for="laki-laki" class="ml-2 text-sm text-gray-800">Laki-Laki</label>
                            </div>
                            <div class="basis-1/2 flex items-center border border-gray-300 rounded-lg p-3">
                                <input type="radio" id="perempuan" name="gender"
                                    class="h-4 w-4 text-blue-600 rounded-full focus:ring-blue-500">
                                <label for="perempuan" class="ml-2 text-sm text-gray-800">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800 mb-1">Tanggal Lahir</label>
                        <div class="grid grid-cols-3 gap-4">
                            <input type="text" placeholder="Tanggal"
                                class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <input type="text" placeholder="Bulan"
                                class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <input type="text" placeholder="Tahun"
                                class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800 mb-1">Alamat</label>
                        <input type="text" placeholder="Alamat"
                            class="mb-2 w-full border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <div class="grid grid-cols-2 gap-2">
                            <input type="text" placeholder="Provinsi"
                                class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <input type="text" placeholder="Kabupaten"
                                class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <input type="text" placeholder="Kecamatan"
                                class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <input type="text" placeholder="Kode POS"
                                class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>

                    <!-- Asal Sekolah dan Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800">Asal Sekolah</label>
                        <input type="text" placeholder="Nama Sekolah"
                            class="mt-1 mb-3 block w-full border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <label class="block text-sm font-semibold text-gray-800">Email</label>
                        <input type="email" placeholder="example@gmail.com"
                            class="mt-1 block w-full border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    {{-- Lampiran --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-800">Lampiran</label>
                        <div
                            class="mt-1 mb-3 block w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                            <!-- Label untuk file input -->
                            <label for="file-input-1"
                                class="flex items-center space-x-2 text-[#023f5b] cursor-pointer">
                                <i class="fas fa-paperclip mr-2"></i>
                                <span class="font-semibold">Akta Kelahiran</span>
                            </label>
                            <p id="file-name-1" class="text-gray-400 text-sm ml-5">No file chosen</p>
                            <input type="file" id="file-input-1"
                                class="mt-1 hidden border-none p-0 opacity-0 cursor-pointer"
                                onchange="updateFileName(1)">
                        </div>

                        <div
                            class="mt-1 block w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <label for="file-input-2"
                                class="flex items-center space-x-2 text-[#023f5b] cursor-pointer">
                                <i class="fas fa-paperclip mr-2"></i>
                                <span class="font-semibold">Upload Rapor</span>
                            </label>
                            <p id="file-name-2" class="text-gray-400 text-sm ml-5">No file chosen</p>

                            <input type="file" id="file-input-2"
                                class="mt-1 hidden border-none p-0 opacity-0 cursor-pointer"
                                onchange="updateFileName(2)">
                        </div>
                    </div>


                    <hr class="border border-b-0 mb-8">
                    <!-- Buttons -->
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
                </form>
            </div>
        </div>
    </section>

    <script>
        function updateFileName(inputNumber) {
            const fileInput = document.querySelectorAll('input[type="file"]')[inputNumber - 1];
            const fileName = fileInput.files[0] ? fileInput.files[0].name : 'No file chosen';
            const fileNameParagraph = document.getElementById(`file-name-${inputNumber}`);
            fileNameParagraph.textContent = fileName;
        }
    </script>
    @include('Partials.footer')

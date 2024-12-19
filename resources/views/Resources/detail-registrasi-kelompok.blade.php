@include('Partials.header')
@include('Partials.nav-blue')
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
                    SIMPAN
                </button>
            </div>
        </div>
    </div>
</section>
@include('Partials.footer')

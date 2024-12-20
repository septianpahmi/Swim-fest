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
                <h3 class="text-2xl text-[#023f5b] font-bold mb-4">2/6</h3>
                <div class="mb-10">
                    @include('Partials.progress-bar')
                </div>
                <h2 class="text-3xl font-bold text-[#023f5b]">
                    Data Diri
                </h2>
            </div>
            <hr class="border border-b-0 mb-8">
            <!-- Form Section -->
            <form action="{{ route('mandiri.post', $event->eventId->slug) }}" method="post" class="space-y-6"
                enctype="multipart/form-data">
                @csrf
                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-semibold text-gray-800">Nama</label>
                    <input type="text" placeholder="Taufik Hidayat" id="nama" name="participant_name"
                        class="mt-1 font-semibold p-3 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Jenis Kelamin</label>
                    <div class="flex flex-row space-x-4">
                        <div class="basis-1/2 flex items-center border border-gray-300 rounded-lg p-3">
                            <input type="radio" id="laki-laki" value="l" name="gender"
                                class="h-4 w-4 text-blue-600  rounded-full focus:ring-blue-500">
                            <label for="laki-laki" class="ml-2 text-sm text-gray-800">Laki-Laki</label>
                        </div>
                        <div class="basis-1/2 flex items-center border border-gray-300 rounded-lg p-3">
                            <input type="radio" id="perempuan" value="p" name="gender"
                                class="h-4 w-4 text-blue-600 rounded-full focus:ring-blue-500">
                            <label for="perempuan" class="ml-2 text-sm text-gray-800">Perempuan</label>
                        </div>
                    </div>
                </div>

                <!-- Tanggal Lahir -->
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Tanggal Lahir</label>
                    <div class="grid grid-cols-3 gap-4">
                        <input type="text" placeholder="Tanggal" name="date"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            min="2" required>
                        <input type="text" placeholder="Bulan" name="month"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            min="2" required>
                        <input type="text" placeholder="Tahun" name="years"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            min="4" required>
                    </div>
                </div>

                <!-- Alamat -->
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Alamat</label>
                    <input type="text" placeholder="Alamat" name="address"
                        class="mb-2 w-full border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                    <div class="grid grid-cols-2 gap-2">
                        <input type="text" placeholder="Provinsi" name="province"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                        <input type="text" placeholder="Kabupaten" name="city"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                        <input type="text" placeholder="Kecamatan" name="district"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                        <input type="text" placeholder="Kode POS" name="zip_code"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                    </div>
                </div>

                <!-- Asal Sekolah dan Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-800">Asal Sekolah</label>
                    <input type="text" placeholder="Nama Sekolah" name="school"
                        class="mt-1 mb-3 block w-full border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                    <label class="block text-sm font-semibold text-gray-800">Email</label>
                    <input type="email" placeholder="example@gmail.com" name="email"
                        class="mt-1 block w-full border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <hr class="border border-b-0 mb-8">
                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row justify-between mt-20">
                    <button type="button"
                        class="py-3 px-6 text-gray-400 border border-gray-400 rounded-lg text-center font-semibold hover:text-white hover:bg-gray-500 sm:w-48 w-full mb-4 sm:mb-0 sm:mr-8"
                        onclick="goBack()">
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
    function goBack() {
        window.route('registrasi.kategori');
    }
</script>
@include('Partials.footer')

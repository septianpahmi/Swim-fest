@include('Partials.header')
@include('Partials.nav-blue')
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
            <a href="{{ route('registrasi.kategori', $event->eventId->slug) }}">
                <button
                    class="w-full bg-red-400 text-white font-medium py-3 rounded-md mb-4 hover:bg-red-500 transition">
                    Registrasi
                </button>
            </a>
            <button
                class="w-full border border-[#023f5b] text-[#023f5b] font-medium py-3 rounded-md hover:bg-[#023f5b] hover:text-white transition">
                <i class="fas fa-square-phone"></i> Kontak
            </button>
        </div>
        <!-- Right Content: Event Details -->
        <hr class="md:hidden border border-b-2 mb-4">
        <div class="w-full lg:w-2/3 space-y-6">
            <!-- Header -->
            <h1 class="text-3xl font-bold text-[#023f5b]">{{ $event->eventId->event_name }}</h1>
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
            <hr class="border border-b-0 mb-2">
            <!-- Event Information -->
            <div class="text-[#023f5b] space-y-4 text-lg">
                <div class="md:flex gap-4">
                    <span>
                        <img src="/image/icon/calendar-dots0.svg" class="mr-1 md:mr-2" alt="">
                    </span>
                    <span class="flex font-bold">
                        Tanggal
                    </span>
                    <span
                        class="md:ml-20">{{ Carbon\Carbon::parse($event->eventId->start_date)->format('d M Y') . ' - ' . Carbon\Carbon::parse($event->eventId->end_date)->format('d M Y') }}</span>
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
                        <li>{{ $event->categoryClass->classes->class_name }} :
                            {{ $event->categoryClass->category->category_name }}</li>
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
                        <a href="#" class="text-blue-500 hover:underline "> {{ $event->eventId->venue }}</a>
                    </ul>
                </div>
                <hr class="border border-b-0 mb-4">
            </div>
            <!-- Description -->
            <div>
                <h2 class="text-xl font-bold mb-2 text-gray-900">Deskripsi</h2>
                <p class="text-gray-800 text-lg leading-relaxed">
                    {{ $event->eventId->description }}
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
        </div>
    </div>
</section>
@include('Partials.footer')
<script src="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.js"></script>
<script src="/js/style.js"></script>
</body>

</html>

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
        <div class="rounded-lg">
            <!-- Image -->
            <div class="mb-6">
                <img src="/image/swimfest-2025.jpeg" alt="Trieste Estate" class="rounded-lg w-80 shadow-lg">
            </div>
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
                    <ul class="md:ml-24" id="category-list">
                        @foreach ($categoryClass as $index => $cat)
                            <li class="category-item" style="{{ $index >= 3 ? 'display: none;' : '' }}">
                                {{ $cat->classes->class_name }} : {{ $cat->category->category_name }}
                            </li>
                        @endforeach
                        @if ($categoryClass->count() > 3)
                            <button id="read-more" class="text-blue-500 hover:underline"
                                onclick="showAllCategories()">Baca Selengkapnya</button>
                            <button id="hide-categories" class="text-blue-500 hover:underline" style="display: none;"
                                onclick="hideAllCategories()">Lebih Sedikit</button>
                        @endif
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
                    <li>Kunjungi situs <a href="www.swimfest.id"
                            class="text-blue-500 hover:underline">www.swimfest.id</a></li>
                    <h2 class="text-lg font-semibold mb-2 text-gray-900">Akun Website</h2>
                    <li>Klik menu “Buat Akun” untuk daftar akun swimfest. Bila sudah memiliki akun anda dapat klik
                        “Login”.</li>
                    <li>Anda akan masuk ke dalam halaman kompetisi, klik menu “Registrasi”.</li>
                    <h2 class="text-lg font-semibold mb-2 text-gray-900">Tipe Pendaftaran</h2>
                    <li>Pilih Pendaftaran Mandiri atau Kelompok.
                        <ul class="list-disc ml-6">
                            <li>Pendaftaran Mandiri: Bila Anda ingin mendaftarkan diri Anda.</li>
                            <li>Pendaftaran Kelompok: Bila Anda ingin mendaftarkan lebih dari 1 orang.</li>
                        </ul>
                    </li>
                    <li>Jika sudah pilih “Selanjutnya”.</li>
                    <h2 class="text-lg font-semibold mb-2 text-gray-900">Data Peserta</h2>
                    <li>Masukan informasi data diri peserta yang ingin didaftarkan
                        <ul class="list-disc ml-6">
                            <li>Nama</li>
                            <li>Jenis Kelamin</li>
                            <li>Tanggal Lahir</li>
                            <li>Alamat</li>
                            <li>Asal Sekolah</li>
                            <li>Email Aktif</li>
                        </ul>
                    </li>
                    <li>Pastikan semua informasi yang dimasukan sudah benar, lalu pilih “Selanjutnya”
                    </li>
                    <h2 class="text-lg font-semibold mb-2 text-gray-900">Lampiran</h2>
                    <li>Unggah lampiran dokumen pendukung
                        <ul class="list-disc ml-6">
                            <li>Akta Kelahiran berupa dokumen pdf atau foto (Max 5 mb).</li>
                            <li>Rapor Terakhir peserta berupa dokumen pdf atau foto (Max 5 mb).</li>
                        </ul>
                    </li>
                    <li>Pastikan semua informasi yang diunggah telah berhasil, lalu pilih “Selanjutnya”
                    </li>
                    <h2 class="text-lg font-semibold mb-2 text-gray-900">Kelas & Nomor Pertandingan</h2>
                    <li>Pilih Kelas dan Nomor Pertandingan yang akan diikuti.
                        <ul class="list-disc ml-6">
                            <li>Pilih Kelas peserta saat ini.</li>
                            <li>Pilih Nomor yang akan diikuti.</li>
                            <li>Tulis catatan waktu terakhir pada nomor yang dipilih, kosongkan bila tidak ada (tulis
                                hanya angka).</li>
                        </ul>
                    </li>
                    <li>Pilih “Ayo Tambah Nomor Renang” bila ingin mengikuti lebih dari satu nomor.</li>
                    <li>Pastikan semua informasi yang dimasukan sudah benar, lalu pilih “Selanjutnya”</li>
                    <li>Periksa ringkasan dan pastikan sudah sesuai dengan pilihan yang Anda inginkan,
                        bila belum sesuai
                        pilih “Kembali” dan bila sudah sesuai pilih “Selanjutnya”.</li>
                    <h2 class="text-lg font-semibold mb-2 text-gray-900">Pembayaran</h2>
                    <li>Periksa kembali nominal biaya pendaftaran, bila sudah sesuai pilih “Pembayaran”.</li>
                    <li>Pilih metode pembayaran yang Anda inginkan.</li>
                    <li>Lakukan pembayaran sesuai instruksi.</li>
                    <li>Pastikan pembayaran telah berhasil dan Anda akan dibawa ke dalam laman pembayaran
                        berhasil,
                        pilih “Unduh Bukti Pembayaran”</li>
                    <h2 class="text-lg font-semibold mb-2 text-gray-900">Peserta Terdaftar
                    </h2>
                    <li>Kembali ke “Beranda” pilih “Profile” disana Anda dapat melihat peserta dan nomor yang telah
                        berhasil terdaftar.</li>
                    <li>Registrasi Selesai</li>
                </ol>
            </div>
            <hr class="md:hidden border border-b-2 mb-4">
            <!-- Event Location -->
            <div>
                <h2 class="text-xl font-bold mb-2 text-gray-900">Alamat Lokasi Event:</h2>
                <p class="text-gray-800 text-lg">
                    {{ $event->eventId->venue }}
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
<script>
    function showAllCategories() {
        const hiddenItems = document.querySelectorAll('#category-list .category-item[style="display: none;"]');
        hiddenItems.forEach(item => {
            item.style.display = 'list-item';
        });

        document.getElementById('read-more').style.display = 'none';
        document.getElementById('hide-categories').style.display = 'inline';
    }

    function hideAllCategories() {
        const allItems = document.querySelectorAll('#category-list .category-item');
        allItems.forEach((item, index) => {
            if (index >= 3) {
                item.style.display = 'none';
            }
        });
        document.getElementById('read-more').style.display = 'inline';
        document.getElementById('hide-categories').style.display = 'none';
    }
</script>
@include('Partials.footer')

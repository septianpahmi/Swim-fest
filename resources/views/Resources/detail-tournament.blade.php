@include('Partials.header')
<link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.23/dist/full.min.css" rel="stylesheet" type="text/css" />
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
                <img src="/image/Flyer Swimfest 2025.png" alt="Trieste Estate" class="rounded-lg w-80 shadow-lg">
            </div>
            <a href="{{ route('registrasi.kategori', $event->eventId->slug) }}">
                <button
                    class="w-full bg-red-400 text-white font-medium py-3 rounded-md mb-4 hover:bg-red-500 transition">
                    Registrasi
                </button>
            </a>
            <form action="https://wa.me/6281214251551" target="_blank" method="get">
                <button
                    class="w-full border border-[#023f5b] text-[#023f5b] font-medium py-3 rounded-md hover:bg-[#023f5b] hover:text-white transition">
                    <i class="fas fa-square-phone"></i> Kontak
                </button>
            </form>
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
                        <button type="button" class="text-blue-500 hover:underline" onclick="my_modal_4.showModal()">
                            Baca Selengkapnya
                        </button>
                        <dialog id="my_modal_4" class="modal">
                            <div class="modal-box justify-center relative p-4 w-full max-w-6xl max-h-full">
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 bg-white sticky -top-4 z-10">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Kelas dan Kategori
                                    </h3>
                                    <form method="dialog">
                                        <button type="btn"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="default-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </form>
                                </div>
                                <table class="table-auto w-full mt-4 text-center border-collapse border-spacing-0">
                                    <thead class="top-0 bg-gray-100 z-10 text-sm">
                                        <tr>
                                            <th class="border px-4 py-2">NOMOR</th>
                                            <th class="border px-4 py-2">BEBAS</th>
                                            <th class="border px-4 py-2">DADA</th>
                                            <th class="border px-4 py-2">KUPU</th>
                                            <th class="border px-4 py-2">PUNGGUNG</th>
                                            <th class="border px-4 py-2">KAKI BEBAS</th>
                                            <th class="border px-4 py-2">KAKI DADA PAPAN</th>
                                            <th class="border px-4 py-2">KAKI BEBAS PAPAN + FINS</th>
                                            <th class="border px-4 py-2">BEBAS + FINS</th>
                                            <th class="border px-4 py-2">KUPU + FINS</th>
                                            <th class="border px-4 py-2">PUNGGUNG + FINS</th>
                                        </tr>
                                    </thead>
                                    <thead class="top-0 bg-gray-100 z-10 text-sm">
                                        <tr>
                                            <th class="border">JARAK</th>
                                            <th class="border">25 M</th>
                                            <th class="border">25 M</th>
                                            <th class="border">25 M</th>
                                            <th class="border">25 M</th>
                                            <th class="border">25 M</th>
                                            <th class="border">25 M</th>
                                            <th class="border">25 M</th>
                                            <th class="border">25 M</th>
                                            <th class="border">25 M</th>
                                            <th class="border">25 M</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categoryClass->groupBy('class_id') as $classGroup)
                                            <tr>
                                                <td class="border whitespace-nowrap px-4 py-2">
                                                    {{ $classGroup->first()->classes->class_name }}
                                                </td>
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <td class="border">
                                                        @if ($classGroup->where('category_id', $i)->first())
                                                            <span class="text-green-600 font-bold">&#10003;</span>
                                                        @else
                                                            <span class="text-red-600 font-bold">X</span>
                                                        @endif
                                                    </td>
                                                @endfor
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </dialog>
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
                    <h2 class="text-lg font-semibold text-gray-900">Website Swimfest 2025</h2>
                    <li>Kunjungi situs <a href="www.swimfest.id"
                            class="text-blue-500 hover:underline">www.swimfest.id</a></li><br />
                    <h2 class="text-lg font-semibold text-gray-900">Akun Website</h2>
                    <li>Klik menu “Buat Akun” untuk daftar akun swimfest. Bila sudah memiliki akun anda dapat klik
                        “Login”.</li>
                    <li>Anda akan masuk ke dalam halaman kompetisi, klik menu “Registrasi”.</li><br />
                    <h2 class="text-lg font-semibold text-gray-900 mt-4">Tipe Pendaftaran</h2>
                    <li>Pilih Pendaftaran Mandiri atau Kelompok.
                        <ul class="list-disc ml-6">
                            <li>Pendaftaran Mandiri: Bila Anda ingin mendaftarkan diri Anda.</li>
                            <li>Pendaftaran Kelompok: Bila Anda ingin mendaftarkan lebih dari 1 orang.</li>
                        </ul>
                    </li>
                    <li>Jika sudah pilih “Selanjutnya”.</li><br />
                    <h2 class="text-lg font-semibold text-gray-900">Data Peserta</h2>
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
                    </li><br />
                    <h2 class="text-lg font-semibold text-gray-900">Lampiran</h2>
                    <li>Unggah lampiran dokumen pendukung
                        <ul class="list-disc ml-6">
                            <li>Akta Kelahiran berupa dokumen pdf atau foto (Max 5 mb).</li>
                            <li>Rapor Terakhir peserta berupa dokumen pdf atau foto (Max 5 mb).</li>
                        </ul>
                    </li>
                    <li>Pastikan semua informasi yang diunggah telah berhasil, lalu pilih “Selanjutnya”
                    </li><br />
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
                        pilih “Kembali” dan bila sudah sesuai pilih “Selanjutnya”.</li><br />
                    <h2 class="text-lg font-semibold text-gray-900">Pembayaran</h2>
                    <li>Periksa kembali nominal biaya pendaftaran, bila sudah sesuai pilih “Pembayaran”.</li>
                    <li>Pilih metode pembayaran yang Anda inginkan.</li>
                    <li>Lakukan pembayaran sesuai instruksi.</li>
                    <li>Pastikan pembayaran telah berhasil dan Anda akan dibawa ke dalam laman
                        pembayaran
                        berhasil,
                        pilih “Unduh Bukti Pembayaran”</li><br />
                    <h2 class="text-lg font-semibold text-gray-900 ">Peserta Terdaftar
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

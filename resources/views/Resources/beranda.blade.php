@include('Partials.header')
@include('Partials.navbar')
<section class="relative bg-[#036e9f] overflow-hidden h-screen">
    <!-- Background Waves -->
    <div class="hidden md:block absolute top-[-60px] right-[-50px] w-[250px] md:w-[543px] h-[200px] md:h-[458px]">
        <img src="/image/icon/bg-hero-left0.svg" alt="Wave Top Right" class="w-full object-cover -rotate-180">
    </div>

    <div class="hidden md:block absolute  top-[240px] left-[-100px] w-[250px] md:w-[543px]  md:h-[458px]">
        <img src="/image/icon/bg-hero-right0.svg" alt="Wave Bottom Left" class="w-full object-cover -rotate-180">
    </div>

    <!-- Content Container -->
    <div
        class="relative container mx-auto flex flex-col-reverse md:flex-row items-center py-24 md:pd-12 md:px-12 h-full">
        <!-- Left Text Content -->
        <div class="hidden md:block text-white w-full md:w-1/2 text-center md:text-left">
            <h1 class="text-4xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">
                Tempat lahirnya Juara Masa Depan! Daftar Sekarang!
            </h1>
            <p class="text-base md:text-lg lg:text-xl mb-6 text-justify md:text-justify">
                Swimfest hadir untuk mendukung bakat anak Anda melalui kompetisi renang resmi yg profesional. Ciptakan
                momen tak terlupakan sambil membentuk masa depan cerah bagi juara muda
            </p>
            @if (Auth::check())
            @else
                <a href="{{ route('signup') }}"
                    class="inline-block bg-[#023f5b] text-white px-6 py-3 rounded-md hover:bg-[#022f44] transition mb-6 md:mb-20">
                    Daftar Sekarang
                </a>
            @endif
            <!-- Navigation Buttons -->
            <div class="hidden md:block flex justify-center md:justify-start space-x-4 items-center">
                <button>
                    <img src="/image/icon/arrow-circle-left0.svg" alt=""
                        class="h-10 w-10 text-white hover:text-gray-300">
                </button>
                <button>
                    <img src="/image/icon/arrow-circle-right0.svg" alt=""
                        class="h-10 w-10 text-white hover:text-gray-300">
                </button>
            </div>
        </div>

        <!-- Images -->
        <div class="w-full md:w-1/2 flex justify-center space-x-4 ml-auto md:float-end -mr-35">
            <!-- Poster 1 -->
            <img src="/image/Flyer Swimfest 1.png" alt="Poster 1" class=" md:w-[80%] rounded-lg shadow-lg">
        </div>
    </div>
</section>

{{-- About --}}
<section class="relative bg-white overflow-hidden">

    <div class="relative container mx-auto flex flex-col md:flex-row py-12 px-6 md:px-12 h-full z-10">
        <!-- Logo on the left -->
        <div class="md:w-1/2 flex justify-center md:justify-start mb-2 md:mb-0">
            <img src="/image/logo/swimfest-primary-logo-11.png" alt="Logo"
                class="hidden md:block object-cover h-[350px] max-w-[450px]">
        </div>

        <!-- Text content on the right -->
        <div class="text-[#023f5b] ml-2 md:ml-8 ">
            <h1 class="text-4xl md:text-4xl font-bold mb-12">Selamat Datang di SwimFest – Ajang Kompetisi Renang untuk
                Generasi Penerus Atlet Juara!</h1>
            <p class="text-lg md:text-xl mb-3 text-justify">
                SwimFest adalah sebuah kompetisi renang yang dirancang khusus untuk anak-anak dan remaja, mulai dari
                jenjang Taman Kanak-Kanak (TK) hingga Sekolah Menengah Atas (SMA). Ajang ini bukan sekadar pertandingan,
                tetapi sebuah pengalaman inspiratif yang dirancang untuk menggali potensi terbaik, membangun semangat
                kompetisi sehat, dan mempererat hubungan dalam komunitas pecinta olahraga renang.
            </p>
            <p class="text-lg md:text-xl mb-3 text-justify">
                Di SwimFest, kami percaya bahwa setiap anak memiliki kemampuan luar biasa yang layak mendapatkan
                sorotan. Oleh karena itu, kami menciptakan platform inklusif yang mendukung perkembangan bakat renang
                sejak dini. Mulai dari mereka yang baru mengenal olahraga renang hingga atlet muda yang sudah
                mencatatkan prestasi, semua memiliki tempat dan kesempatan untuk bersinar di SwimFest.
            </p>
            <p class="text-lg md:text-xl mb-3 font-semibold text-justify">
                Apa yang Membuat SwimFest Berbeda?
            </p>
            <p class="text-lg md:text-xl text-justify">Kategori Usia yang Beragam:</p>
            <p class="text-lg md:text-xl mb-3 text-justify">Selain hadiah menarik untuk para pemenang, semua peserta
                akan mendapatkan pengalaman berharga dan penghargaan sebagai bagian dari perjalanan mereka menuju
                kesuksesan.</p>
            <p class="text-lg md:text-xl text-justify">Lebih dari Kompetisi: </p>
            <p class="text-lg md:text-xl mb-3 text-justify">SwimFest adalah tentang membangun kepercayaan diri,
                mengembangkan kedisiplinan, dan menciptakan kenangan tak terlupakan, baik bagi anak-anak maupun orang
                tua mereka.</p>
            <p class="text-lg md:text-xl text-justify">Kolaborasi dengan Klub dan Sekolah: </p>
            <p class="text-lg md:text-xl mb-3 text-justify">Kami bekerja sama dengan klub renang dan sekolah-sekolah
                untuk mendukung program pembinaan atlet sejak usia dini.</p>
            <p class="text-lg md:text-xl mb-3 font-semibold text-justify">Kenapa Anda Harus Bergabung? SwimFest adalah
                kesempatan emas
                untuk:
            <ul class="list-disc md:text-xl ml-6 mb-3 text-justify">
                <li>Melihat anak Anda berkembang tidak hanya sebagai perenang, tetapi juga sebagai individu yang percaya
                    diri dan penuh semangat.</li>
                <li>Memberikan wadah bagi klub renang atau sekolah untuk mengasah bakat dan menampilkan keunggulan
                    mereka di tingkat nasional.</li>
                <li>Menjadi bagian dari komunitas besar pecinta olahraga renang yang mendukung satu sama lain.</li>
                <li>Bersama SwimFest, kami yakin bahwa mimpi besar dimulai dari langkah kecil di kolam renang. Daftarkan
                    anak Anda atau tim Anda sekarang, dan bergabunglah dengan ratusan peserta lainnya untuk merayakan
                    olahraga, prestasi, dan kebersamaan!</li>
            </ul>
            <p class="text-lg md:text-xl mb-3 text-justify">Ayo mulai perjalanan menuju podium juara – hanya di
                SwimFest!
            </p>
        </div>
    </div>
</section>

{{-- Turnament --}}
{{-- <section class="relative bg-[#DAF3FF] overflow-hidden min-h-screen md:h-screen">

    <div class="relative container mx-auto justify-center items-center py-12 px-12 md:px-20 h-full z-10">
        <div class="md:flex md:top-6 md:justify-between py-12 md:px-12">
            <h1 class="text-3xl font-bold text-[#023f5b]">Turnamen</h1>
            <a href="#" class="hidden md:block text-[#023f5b] font-semibold hover:underline">
                Lihat Semua >
            </a>
        </div>
        <div class="relative max-w-5xl mx-auto bg-white rounded-lg shadow-md overflow-hidden md:flex py-2 px-2">
            <!-- Poster/Gambar -->
            <div class="rounded-lg">
                <img src="/image/image-250.png" alt="Trieste Estate 2016"
                    class="object-cover rounded-lg w-auto max-w-full md:max-w-[291px]" />
            </div>
            @foreach ($event as $events)
                <!-- Detail Turnamen -->
                <div class="p-6 ml-2">
                    <h2 class="text-4xl font-bold text-gray-800 mb-12">
                        {{ $events->eventId->event_name }}
                    </h2>
                    <div class="mb-6">
                        <p class="md:flex text-gray-600 mb-4">
                            <span>
                                <img src="/image/icon/calendar-dots0.svg" class="mr-1 md:mr-4" alt="">
                            </span>
                            <span class="flex font-bold">Tanggal</span>
                            <span
                                class="md:ml-20">{{ Carbon\Carbon::parse($events->eventId->start_date)->format('d M Y') . ' - ' . Carbon\Carbon::parse($events->eventId->end_date)->format('d M Y') }}</span>
                        </p>
                        <p class="md:flex text-gray-600 mb-4">
                            <span>
                                <img src="/image/icon/person-simple-swim0.svg" class="mr-2 md:mr-4" alt="">
                            </span>
                            <span class="flex font-bold">Kelas</span>
                            <span class="md:ml-24">
                                {{ $events->categoryClass->classes->class_name }} :
                                {{ $events->categoryClass->category->category_name }} <br />
                                <a href="#" class="text-blue-500 hover:underline">2 Lainnya</a>
                            </span>

                        </p>
                        <p class="md:flex text-gray-600 mb-4">
                            <span>
                                <img src="/image/icon/map-pin-simple-line0.svg" class="mr-1 md:mr-4" alt="">
                            </span>
                            <span class="flex font-bold">Tanggal</span>
                            <span class="md:ml-20">
                                {{ $events->eventId->venue }}
                            </span>
                        </p>
                    </div>
                    <a href="{{ route('detail.lomba', $events->eventId->slug) }}"
                        class="absolute bottom-6 text-[#023f5b] font-semibold hover:underline">
                        Baca Selengkapnya >
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}
{{-- galeri --}}
{{-- <section class="relative bg-colo-white overflow-hidden h-screen">

    <div class="relative container mx-auto items-center py-12 px-12 md:px-20 h-full z-10">
        <div class="md:flex md:top-6 md:justify-between py-12  md:px-12">
            <h1 class="text-3xl font-bold text-[#023f5b]">Galeri</h1>
            <a href="#" class="hidden md:block text-[#023f5b] font-semibold hover:underline">
                Lihat Semua >
            </a>
        </div>
        <!-- Slider -->
        <div
            data-hs-carousel='{"loadingClasses": "opacity-0","dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500","slidesQty": {"xs": 1,"lg": 5}}'>

            <div class="hs-carousel w-full overflow-hidden bg-white rounded-lg">
                <div class="relative min-h-72 -mx-1">
                    <!-- transition-transform duration-700 -->
                    <div
                        class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap opacity-0 transition-transform duration-700">
                        <div class="hs-carousel-slide px-1">
                            <img src="/image/image-190.png" class="flex justify-center object-cover h-full"
                                alt="">
                        </div>
                        <div class="hs-carousel-slide px-1">
                            <img src="/image/image-180.png" class="flex justify-center object-cover h-full"
                                alt="">
                        </div>
                        <div class="hs-carousel-slide px-1">
                            <img src="/image/image-160.png" class="flex justify-center object-cover h-full"
                                alt="">
                        </div>
                        <div class="hs-carousel-slide px-1">
                            <img src="/image/image-170.png" class="flex justify-center object-cover h-full"
                                alt="">
                        </div>
                        <div class="hs-carousel-slide px-1">
                            <img src="/image/image-200.png" class="flex justify-center object-cover h-full"
                                alt="">
                        </div>
                        <div class="hs-carousel-slide px-1">
                            <img src="/image/image-200.png" class="flex justify-center object-cover h-full"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
            <button type="button"
                class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 focus:outline-none rounded-s-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                <span class="text-2xl" aria-hidden="true">
                    <img src="/image/icon/arrow-circle-left1.svg" alt="">
                </span>
                <span class="sr-only">Previous</span>
            </button>
            <button type="button"
                class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 focus:outline-none rounded-e-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                <span class="sr-only">Next</span>
                <span class="text-2xl" aria-hidden="true">
                    <img src="/image/icon/arrow-circle-right1.svg" alt="">
                </span>
            </button>
        </div>
        <!-- End Slider -->
        <div class="hidden md:block flex top-6 text-center justify-center py-12 px-12">
            <h1 class="text-xl font-bold text-[#023f5b]">Aqua Velocity Championship 2025</h1>
        </div>
    </div>

</section> --}}
{{-- partner --}}
<section class="relative bg-colo-white overflow-hidden">

    <div class="relative container mx-auto items-center py-6 px-6 md:py-12 md:px-20 h-full z-10">
        <div class="flex top-6 justify-between py-12 px-12">
            <h1 class="text-3xl font-bold text-[#023f5b]">Partner</h1>
        </div>
        <div class="flex flex-wrap justify-center md:gap-8 gap-4">
            <!-- Partner Logo 1 -->
            <div class="flex justify-center items-center">
                <img src="/image/partner/Gemilang Prima.png" alt="Partner 1" class="w-20 md:w-60 h-auto md:h-auto">
            </div>
            <!-- Partner Logo 2 -->
            <div class="flex justify-center items-center">
                <img src="/image/partner/akuatik indonesia.png" alt="Partner 2" class="w-20 md:w-60 h-auto md:h-auto">
            </div>
            <!-- Partner Logo 3 -->
            <div class="flex justify-center items-center">
                <img src="/image/partner/Logo Cantum Hitam.png" alt="Partner 4" class="w-20 md:w-60 h-auto md:h-auto">
            </div>
        </div>
    </div>
</section>
@include('Partials.footer')

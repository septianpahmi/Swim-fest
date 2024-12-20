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
            <h1 class="text-4xl md:text-6xl lg:text-8xl font-bold mb-4 leading-tight">
                SWIMFEST 2025
            </h1>
            <p class="text-base md:text-lg lg:text-xl mb-6 text-justify md:text-justify">
                Swimfest adalah platform turnamen renang yang dirancang untuk semua kalangan, dari pelajar hingga
                profesional. Kami percaya setiap perenang memiliki potensi besar yang layak untuk ditampilkan di
                arena kompetisi.
            </p>
            <a href="{{ route('signup') }}"
                class="inline-block bg-[#023f5b] text-white px-6 py-3 rounded-md hover:bg-[#022f44] transition mb-6 md:mb-20">
                Daftar Sekarang
            </a>
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
        <div class="w-full md:w-1/2 flex justify-center space-x-4 ml-auto md:float-end -mr-40">
            <!-- Poster 1 -->
            <img src="/image/image-400.png" alt="Poster 1" class="w-full md:w-[45%] rounded-lg shadow-lg">
            <!-- Poster 2 -->
            <img src="/image/image-270.png" alt="Poster 2" class="w-full md:w-[45%] rounded-lg shadow-lg">
        </div>
    </div>
</section>

{{-- About --}}
<section class="relative bg-white overflow-hidden h-screen">

    <div class="relative container mx-auto flex flex-col md:flex-row items-center py-12 px-6 md:px-12 h-full z-10">
        <!-- Logo on the left -->
        <div class="md:w-1/2 flex justify-center md:justify-start mb-2 md:mb-0">
            <img src="/image/logo/swimfest-primary-logo-11.png" alt="Logo"
                class="hidden md:block object-cover h-[350px] max-w-[450px]">
        </div>

        <!-- Text content on the right -->
        <div class="text-[#023f5b] ml-2 md:ml-8 ">
            <h1 class="text-4xl md:text-4xl font-bold mb-12">SWIMFEST</h1>
            <p class="text-lg md:text-xl mb-3 text-justify">
                Swimfest adalah platform turnamen renang yang dirancang untuk
                semua kalangan, dari pelajar hingga profesional. Kami percaya
                setiap perenang memiliki potensi besar yang layak untuk
                ditampilkan di arena kompetisi.
            </p>
            <p class="text-lg md:text-xl mb-12 text-justify">
                Dengan turnamen yang adil dan penuh tantangan, kami memberikan
                kesempatan bagi setiap atlet untuk mengembangkan kemampuan mereka.
                Bergabunglah bersama kami dan jadilah bagian dari komunitas yang
                mendukung perjalananmu menuju prestasi tertinggi!
            </p>
            <a href="#" class="text-lg md:text-lg hover:underline mb-20">
                Baca Selengkapnya >
            </a>
        </div>
    </div>
</section>

{{-- Turnament --}}
<section class="relative bg-[#DAF3FF] overflow-hidden min-h-screen md:h-screen">

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
</section>
{{-- galeri --}}
<section class="relative bg-colo-white overflow-hidden h-screen">

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

</section>
{{-- partner --}}
<section class="relative bg-colo-white overflow-hidden h-screen">

    <div class="relative container mx-auto items-center py-6 px-6 md:py-12 md:px-20 h-full z-10">
        <div class="flex top-6 justify-between py-12 px-12">
            <h1 class="text-3xl font-bold text-[#023f5b]">Partner</h1>
        </div>
        <div class="flex flex-wrap justify-center md:gap-8 gap-4">
            <!-- Partner Logo 1 -->
            <div class="flex justify-center items-center">
                <img src="/image/partner/image-80.png" alt="Partner 1" class="w-20 md:w-32 h-auto md:h-auto">
            </div>
            <!-- Partner Logo 2 -->
            <div class="flex justify-center items-center">
                <img src="/image/partner/image-90.png" alt="Partner 2" class="w-20 md:w-32 h-auto md:h-auto">
            </div>
            <!-- Partner Logo 3 -->
            <div class="flex justify-center items-center">
                <img src="/image/partner/image-100.png" alt="Partner 3" class="w-20 md:w-32 h-auto md:h-auto">
            </div>
            <!-- Partner Logo 4 -->
            <div class="flex justify-center items-center">
                <img src="/image/partner/image-130.png" alt="Partner 4" class="w-20 md:w-32 h-auto md:h-auto">
            </div>
            <!-- Partner Logo 5 -->
            <div class="flex justify-center items-center">
                <img src="/image/partner/image-140.png" alt="Partner 5" class="w-20 md:w-32 h-auto md:h-auto">
            </div>
            <!-- Partner Logo 6 -->
            <div class="flex justify-center items-center">
                <img src="/image/partner/image-210.png" alt="Partner 5" class="w-20 md:w-32 h-auto md:h-auto">
            </div>
        </div>
    </div>
</section>
@include('Partials.footer')

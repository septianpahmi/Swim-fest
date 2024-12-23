@include('Partials.header')
@include('Partials.nav-blue')
<section class="relative bg-[#DAF3FF] overflow-hidden min-h-screen">
    <div class="relative container mx-auto py-12 px-6 md:px-20 h-full z-10">
        <div class="relative max-w-2xl mx-auto bg-white rounded-2xl shadow-lg py-8 px-8">
            <!-- Header Form -->
            <div class="w-full mb-8">
                <div class="flex justify-between">
                    <h3 class="text-lg font-bold text-[#023f5b] mb-2">
                        Pendaftaran Kelompok
                    </h3>
                    <h3 class="text-lg text-[#023f5b] font-bold mb-4">5/6</h3>
                </div>
                <div class="mb-10">
                    @include('Partials.progress-bar-kelompok')
                </div>
            </div>
            <!-- Peserta Input -->
            <div id="peserta-list" class="space-y-4">
                @foreach ($peserta as $index => $pesertas)
                    <div class="flex items-center justify-between border-2 border-grey p-4 rounded-2xl peserta">
                        <div class="flex items-center space-x-2">
                            <span class="text-[#023f5b] text-lg font-bold">
                                <i class="fas fa-user"></i> {{ $pesertas['participant_name'] }}
                            </span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button url="" type="button" class="text-[#023f5b] hover:text-blue-800 status">
                                <i class="fas fa-pencil"></i>
                            </button>
                            @if ($index > 0)
                                <a href="{{ route('kelompok.remove', $pesertas['participant_name']) }}" type="button"
                                    data-id="{{ $pesertas['participant_name'] }}"
                                    class="text-red-400 hover:text-red-600 delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Tambah Peserta -->
            <div class="mt-6 mb-4">
                <button id="tambah-peserta"
                    class="flex justify-center w-full py-3 px-6 border-2 border-gray p-4 rounded-2xl">
                    <div class="mr-2 mt-2">
                        <img src="image/icon/icon-tambah-peserta.png" alt="">
                    </div>
                    <div class="ml-2">
                        <a href="{{ route('addPesertaKelompok', $event->eventId->slug) }}" type="button"
                            class="text-[#023f5b] text-lg font-bold"><i class="fas fa-user-plus"></i> Tambah Nomor
                            Peserta</a>
                    </div>
                </button>
            </div>
            <hr class="border-b-1 border-grey mt-4 mb-4">

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row justify-between mt-6">
                <button onclick="goBack()"
                    class="py-3 px-6 text-gray-400 border border-gray-400 rounded-lg text-center font-semibold hover:text-white hover:bg-gray-500 sm:w-48 w-full mb-4 sm:mb-0 sm:mr-8">
                    Kembali
                </button>
                <form action="{{ route('kelompok.checkoutProccess', $event->eventId->slug) }}" method="GET"
                    class="md:w-full">
                    <button
                        class="py-3 px-6 text-white bg-red-500 rounded-lg text-center font-semibold hover:bg-red-600 sm:w-48 md:w-full">
                        SELANJUTNYA
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@include('Partials.footer')

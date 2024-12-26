@include('Partials.header')
@include('Partials.nav-blue')
<section class="relative bg-[#DAF3FF] overflow-hidden min-h-screen">
    <div class="relative container mx-auto py-12 px-6 md:px-20 h-full z-10">
        <div class="relative max-w-2xl mx-auto bg-white rounded-2xl shadow-lg py-8 px-8">
            <!-- Header Form -->
            <div class="w-full mb-8">
                <h3 class="text-2xl text-[#023f5b] font-bold mb-4">5/6</h3>
                <div class="mb-4">
                    @include('Partials.progress-bar')
                </div>
                <h3 class="text-xl font-bold text-[#023f5b] mb-2">
                    Ringkasan
                </h3>
            </div>
            <hr class="border-b-1 border-grey mb-4">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-[#023f5b] mb-2">Kelas</label>
                    @foreach ($kelas as $kel)
                        <p class="w-full rounded-lg focus:ring-[#023f5b] focus:border-[#023f5b]">
                            {{ $kel->class_name }}
                        </p>
                    @endforeach
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#023f5b] mb-2">Nomor Renang</label>
                    @foreach ($category as $item)
                        <p class="w-full rounded-lg focus:ring-[#023f5b] focus:border-[#023f5b]">
                            {{ $item->category_name }}
                        </p>
                    @endforeach
                </div>
                <hr class="border-b-1 border-grey mb-4 mt-6">
                <div class="flex flex-col sm:flex-row justify-between mt-6">
                    <button type="button"
                        class="py-3 px-6 text-gray-400 border border-gray-400 rounded-lg text-center font-semibold hover:text-white hover:bg-gray-500 sm:w-48 w-full mb-4 sm:mb-0 sm:mr-8"
                        onclick="goBack()">
                        Kembali
                    </button>
                    <form action="{{ route('mandiri.RingkasanPembayaran', $event->eventId->slug) }}" method="get"
                        class="w-full">
                        <button
                            class="py-3 px-6 text-white bg-red-500 rounded-lg text-center font-semibold hover:bg-red-600 sm:w-48 md:w-full">
                            Selanjutnya
                        </button>
                    </form>
                </div>
            </div>
</section>

@include('Partials.footer')

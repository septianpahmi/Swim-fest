@include('Partials.header')
@include('Partials.nav-blue')
<section class="relative bg-[#DAF3FF] overflow-hidden min-h-screen">
    <div class="relative container mx-auto py-12 px-6 md:px-20 h-full z-10">
        <div class="relative max-w-2xl mx-auto bg-white rounded-2xl shadow-lg py-8 px-8">
            <!-- Header Form -->
            <div class="w-full mb-8">
                <h3 class="text-3xl font-bold text-[#023f5b] mb-2">
                    Berhasil
                </h3>
            </div>
            <div class="flex justify-between">
                <div>
                    <label class="block text-sm font-semibold text-[#023f5b] mb-2">ID Transaksi</label>
                    <p class="w-full rounded-lg text-sm text-gray-400 ">{{ $payment->reff_id }}</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-[#023f5b] mb-2">Waktu</label>
                    <p class="w-full rounded-lg text-sm text-gray-400 ">
                        {{ Carbon\Carbon::parse($payment->created_at)->timezone('Asia/Jakarta')->isoFormat('D MMMM YYYY HH:mm') }}
                    </p>
                </div>
            </div>

            <hr class="border-b-1 border-grey mt-2 mb-4">

            <div class="w-full mb-8">
                <h3 class="text-xl font-bold text-[#023f5b] mb-2">
                    Rincian Pembayaran
                </h3>
            </div>

            <!-- Form Fields -->
            <div class="space-y-4">
                <!-- Kelas -->
                <div>
                    <label class="block text-sm font-semibold text-[#023f5b] mb-2">Biaya Pendaftaran</label>
                    <div class="flex justify-between">
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-400 ">Rp.
                                {{ number_format($payment->sub_total, 0, '.', '.') }} X {{ $nomor }} Nomor</p>
                        </div>
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-400 ">
                                Rp. {{ number_format($payment->fee, 0, '.', '.') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Form Fields -->
                <div>
                    <label class="block text-sm font-semibold text-[#023f5b] mb-2">Biaya Lain - Lain</label>
                    <div class="flex justify-between">
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-400 ">Biaya Admin</p>
                        </div>
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-400 ">Rp.
                                {{ number_format($admin, 0, '.', '.') }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-400 ">Pajak</p>
                        </div>
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-400 ">2%</p>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-[#023f5b] mb-2">Metode Pembayaran</label>
                    <div class="flex justify-between">
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-400 ">
                                {{ strtoupper($payment->payment_method) }}</p>
                        </div>
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-400 ">
                                Rp. {{ number_format($payment->grand_total, 0, '.', '.') }}</p>
                        </div>
                    </div>
                </div>

                <hr class="border-b-1 border-grey mt-4 mb-4">
                <div class="flex flex-col flex-row justify-between mt-6 ">
                    <a href="{{ route('faktur', ['id' => Auth::id(), 'regis' => $registrations->no_registration, 'slug' => $event->eventId->slug]) }}"
                        type="button" target="_blank"
                        class="py-3 px-6 text-gray-400 border border-gray-400 rounded-lg text-center font-semibold hover:text-white hover:bg-gray-500 sm:w-48 md:w-full md:mb-4 sm:mb-0 sm:mr-8">
                        Unduh Bukti Pembayaran
                    </a>
                    <form action="{{ route('profile', Auth::id()) }}">
                        <button
                            class="py-3 px-6 text-white bg-red-500 rounded-lg text-center font-semibold hover:bg-red-600 sm:w-48 md:w-full">
                            Pertandingan Saya
                        </button>
                    </form>
                </div>
            </div>
        </div>
</section>
@include('Partials.footer')

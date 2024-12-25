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
                                {{ number_format($payment->sub_total, 0, '.', '.') }}</p>
                        </div>
                        <div>
                            Rp. {{ number_format($payment->fee, 0, '.', '.') }}</p>
                        </div>
                    </div>
                    <p class="w-full rounded-lg text-sm text-gray-400 ">{{ $nomor }} Nomor</p>
                </div>

                <!-- Form Fields -->
                {{-- <div>
                    <label class="block text-sm font-semibold text-[#023f5b] mb-2">Biaya Admin</label>
                    <div class="flex justify-between">
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-400 ">Rp.300.000</p>
                        </div>
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-400 ">Rp.300.000</p>
                        </div>
                    </div>
                </div> --}}
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
                <form action="{{ route('beranda') }}">
                    <button
                        class="py-3 px-6 text-white bg-red-500 rounded-lg text-center font-semibold hover:bg-red-600 sm:w-48 md:w-full">
                        Beranda
                    </button>
                </form>
            </div>
        </div>
</section>
@include('Partials.footer')

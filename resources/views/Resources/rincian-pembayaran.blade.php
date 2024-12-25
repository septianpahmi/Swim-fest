@include('Partials.header')
@include('Partials.nav-blue')
<section class="relative bg-[#DAF3FF] overflow-hidden min-h-screen">
    <div class="relative container mx-auto py-12 px-6 md:px-20 h-full z-10">
        <div class="relative max-w-2xl mx-auto bg-white rounded-2xl shadow-lg py-8 px-8">
            <!-- Header Form -->
            <div class="w-full mb-8">
                <h3 class="text-2xl text-[#023f5b] font-bold mb-4">6/6</h3>
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
                    <div class="flex justify-between">
                        <label class="block text-sm font-semibold text-[#023f5b] mb-2">Biaya Pendaftaran</label>
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-500 ">Rp.
                                {{ number_format($price, 0, '.', '.') }}
                            </p>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <p class="rounded-lg text-sm text-gray-500 ">{{ $kelas }} Nomor</p>
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-500 ">Rp.
                                {{ number_format($total, 0, '.', '.') }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- <hr class="border-b-1 border-grey mb-4 mt-6">
                <div>
                    <label class="block text-sm font-semibold text-[#023f5b] mb-2">Biaya Admin</label>
                    <div class="flex justify-between">
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-500 ">Rp. 300.000</p>
                        </div>
                        <div>
                            <p class="w-full rounded-lg text-sm text-gray-500 ">Rp. 300.000</p>
                        </div>
                    </div>
                </div> --}}

                <hr class="border-b-1 border-grey mb-4 mt-6">

                <div class="flex justify-between">
                    <div>
                        <h3 class="block text-md text-xl font-semibold text-[#023f5b] mb-2">Total</h3>
                    </div>
                    <div>
                        <h3 class="w-full text-xl rounded-lg font-semibold text-md font-semibold text-[#023f5b] ">
                            Rp. {{ number_format($grand, 0, '.', '.') }}</h3>
                    </div>
                </div>
                {{-- <form action="{{ route('checkout', $event->eventId->slug) }}" method="GET"> --}}
                <div class="flex flex-col sm:flex-row justify-between mt-6">
                    <button type="button"
                        class="py-3 px-6 text-gray-400 border border-gray-400 rounded-lg text-center font-semibold hover:text-white hover:bg-gray-500 sm:w-48 w-full mb-4 sm:mb-0 sm:mr-8"
                        onclick="goBack()">
                        Kembali
                    </button>
                    <button id="pay-button"
                        class="py-3 px-6 text-white bg-red-500 rounded-lg text-center font-semibold hover:bg-red-600 sm:w-48 md:w-full">
                        Pembayaran
                    </button>
                </div>
                {{-- </form> --}}
            </div>
</section>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        // SnapToken acquired from previous step
        snap.pay('{{ $checkout->reff_id }}', {
            onSuccess: function(result) {
                console.log(result);
                var paymentMethod = result.payment_type;
                var redirectUrl =
                    "{{ route('success-transaction-mandiri', ['id' => $checkout->id, 'slug' => $event->eventId->slug]) }}";
                redirectUrl += "?payment_method=" + encodeURIComponent(paymentMethod);
                window.location.href = redirectUrl;
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    };
</script>
@include('Partials.footer')

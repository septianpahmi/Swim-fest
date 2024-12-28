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
                <img src="/image/Flyer Swimfest 1.png" alt="Trieste Estate" class="rounded-lg w-80 shadow-lg">
            </div>
        </div>
        <hr class="md:hidden border border-b-2 mb-4">
        <div class="w-full lg:w-2/3 space-y-6">
            <!-- Header -->
            <h1 class="text-3xl font-bold text-[#023f5b]">{{ $event->eventId->event_name }}</h1>
            <hr class="border border-b-0 mt-4">
            <!-- Event Information -->
            <div class="text-[#023f5b] space-y-4 text-lg">
                <div class="md:flex gap-4">
                    <span>
                        <img src="/image/icon/calendar-dots0.svg" class="mr-1 md:mr-2" alt="">
                    </span>
                    <span class="flex font-bold">
                        Tanggal
                    </span>
                    <span class="md:ml-20">
                        {{ Carbon\Carbon::parse($event->eventId->start_date)->format('d M Y') . ' - ' . Carbon\Carbon::parse($event->eventId->end_date)->format('d M Y') }}
                    </span>
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
                            @if ($index < 3)
                                <li class="category-item">
                                    {{ $cat->classes->class_name }} : {{ $cat->category->category_name }}
                                </li>
                            @endif
                        @endforeach
                        <button type="button" class="text-blue-500 hover:underline" onclick="my_modal_4.showModal()">
                            Baca Selengkapnya
                        </button>
                        <dialog id="my_modal_4" class="modal">
                            <div class="modal-box w-11/12 max-w-5xl">
                                <h3 class="text-lg font-bold">Kelas dan Kategori</h3>
                                <table class="table-auto w-full mt-4">
                                    <thead>
                                        <tr>
                                            <th class="border px-4 py-2">Nomor</th>
                                            <th class="border px-4 py-2">Bebas</th>
                                            <th class="border px-4 py-2">Dada</th>
                                            <th class="border px-4 py-2">Kupu</th>
                                            <th class="border px-4 py-2">Punggung</th>
                                            <th class="border px-4 py-2">Kaki Bebas</th>
                                            <th class="border px-4 py-2">Kaki Dada Papan</th>
                                            <th class="border px-4 py-2">Kaki Bebas Papan + Fins</th>
                                            <th class="border px-4 py-2">Bebas + Fins</th>
                                            <th class="border px-4 py-2">Kupu + Fins</th>
                                            <th class="border px-4 py-2">Punggung + Fins</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categoryClass->groupBy('class_id') as $classGroup)
                                            <tr>
                                                <td class="border px-4 py-2">
                                                    {{ $classGroup->first()->classes->class_name }}
                                                </td>
                                                <td class="border px-4 py-2">
                                                    @if ($classGroup->where('category_id', 1)->first())
                                                        X
                                                    @endif
                                                </td>
                                                <td class="border px-4 py-2">
                                                    @if ($classGroup->where('category_id', 2)->first())
                                                        X
                                                    @endif
                                                </td>
                                                <td class="border px-4 py-2">
                                                    @if ($classGroup->where('category_id', 3)->first())
                                                        X
                                                    @endif
                                                </td>
                                                <td class="border px-4 py-2">
                                                    @if ($classGroup->where('category_id', 4)->first())
                                                        X
                                                    @endif
                                                </td>
                                                <td class="border px-4 py-2">
                                                    @if ($classGroup->where('category_id', 5)->first())
                                                        X
                                                    @endif
                                                </td>
                                                <td class="border px-4 py-2">
                                                    @if ($classGroup->where('category_id', 6)->first())
                                                        X
                                                    @endif
                                                </td>
                                                <td class="border px-4 py-2">
                                                    @if ($classGroup->where('category_id', 7)->first())
                                                        X
                                                    @endif
                                                </td>
                                                <td class="border px-4 py-2">
                                                    @if ($classGroup->where('category_id', 8)->first())
                                                        X
                                                    @endif
                                                </td>
                                                <td class="border px-4 py-2">
                                                    @if ($classGroup->where('category_id', 9)->first())
                                                        X
                                                    @endif
                                                </td>
                                                <td class="border px-4 py-2">
                                                    @if ($classGroup->where('category_id', 10)->first())
                                                        X
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="modal-action">
                                    <form method="dialog">
                                        <button class="btn">Close</button>
                                    </form>
                                </div>
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
                        <a href="#" class="text-blue-500 hover:underline ">
                            {{ $event->eventId->venue }}
                        </a>
                    </ul>
                </div>
                <hr class="border border-b-0 mb-4">

            </div>

            <h2 class="text-lg font-bold"><i class="fas fa-user"></i>&nbsp; Daftar Peserta & Nomor Renang</h2>
            <!-- Card -->
            @foreach ($parCat as $item)
                <div class="border rounded-lg p-4 shadow-sm space-y-2 text-gray-800 mb-6">

                    <div class="grid grid-cols-3">
                        <div class="font-bold">Nomor Reg</div>
                        <div>: {{ $item->participantRegistration->registrationId->no_registration }}</div>
                        <div></div>

                        <div class="font-bold">Nama</div>
                        <div>: {{ $item->participantRegistration->participantId->participant_name }}</div>
                        <div></div>

                        <div class="font-bold">Nomor Renang</div>
                        <div>: {{ $item->no_renang }}</div>
                        <div></div>
                        <div class="font-bold">Kelas</div>
                        <div>: @foreach ($item->categories as $c)
                                {{ $c->category_name }}
                            @endforeach
                        </div>
                        <div></div>

                        <div class="font-bold">Peringkat</div>
                        <div>: -</div>
                        <div></div>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-between border-t pt-3 mt-2 mt-20 w-full">
                        <button type="button"
                            class="py-3 px-6 text-[#023f5b] border border-[#023f5b] rounded-lg text-center font-semibold hover:text-white hover:bg-[#023f5b] w-full mb-4 sm:mb-0 sm:mr-8">
                            <i class="fas fa-certificate"></i>&nbsp; Unduh Sertifikat
                        </button>
                        <button
                            class="py-3 px-6 text-[#023f5b] border border-[#023f5b] rounded-lg text-center font-semibold hover:text-white hover:bg-[#023f5b] w-full">
                            <i class="fas fa-images"></i>&nbsp; Unduh Dokumentasi
                        </button>
                    </div>
                </div>
            @endforeach
            <h2 class="text-lg font-bold mt-8"><i class="fas fa-credit-card"></i>&nbsp; Pembayaran</h2>
            <div class="flex flex-col sm:flex-row justify-between">
                @if (isset($regisData))
                    @if ($regisData->status === 'Success')
                        <a href="{{ route('faktur', ['id' => Auth::id(), 'regis' => $regisData->no_registration, 'slug' => $event->eventId->slug]) }}"
                            type="button"
                            class="py-3 px-6 text-[#023f5b] border border-[#023f5b] rounded-lg text-center font-semibold hover:text-white hover:bg-[#023f5b] w-1/2 mb-4 sm:mb-0 sm:mr-8">
                            <i class="fas fa-file-invoice"></i>&nbsp; Unduh Bukti Pembayaran
                        </a>
                    @else
                        <button id="pay-button"
                            class="py-3 px-6 text-[#023f5b] border border-[#023f5b] rounded-lg text-center font-semibold hover:text-white hover:bg-[#023f5b] w-1/2">
                            <i class="fas fa-money-bill"></i>&nbsp; Pembayaran
                        </button>
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>
@if (env('MIDTRANS_IS_PRODUCTION') == false)
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
    </script>
@else
    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
@endif
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        snap.pay('{{ $checkout->reff_id }}', {
            onSuccess: function(result) {
                var paymentMethod = result.payment_type;
                var redirectUrl =
                    "{{ route('detailLomba.checkout', ['id' => $checkout->id, 'regis' => $regisData->no_registration, 'slug' => $event->eventId->slug]) }}";
                redirectUrl += "?payment_method=" + encodeURIComponent(paymentMethod);
                window.location.href = redirectUrl;
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            onPending: function(result) {
                console.log('Payment Pending:', result);
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            onError: function(result) {
                console.log('Payment Error:', result);
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    };
</script>
@include('Partials.footer')

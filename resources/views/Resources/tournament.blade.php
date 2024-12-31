@include('Partials.header')
<link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.23/dist/full.min.css" rel="stylesheet" type="text/css" />
@include('Partials.nav-blue')
<section class="relative bg-color-white">
    <div class="relative container mx-auto items-center px-6 md:px-12 md:px-20 h-full z-10">
        <div class="flex top-6 justify-between py-12 px-6 md:px-12">
            <h1 class="text-3xl font-bold text-[#023f5b]">Turnamen</h1>
            <div class="relative inline-block text-left">
                <div>
                    <button type="button"
                        class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                        id="menu-button" aria-expanded="false" aria-haspopup="true">
                        2024
                        <svg class="-mr-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.23a.75.75 0 0 1 1.06 0L10 10.94l3.72-3.72a.75.75 0 1 1 1.06 1.06L10.53 12.47a.75.75 0 0 1-1.06 0L5.23 8.29a.75.75 0 0 1 0-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 hidden"
                    id="dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button">
                    <div class="py-1" role="none">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem">2025</a>
                    </div>
                </div>
            </div>

        </div>
        {{-- Poster --}}
        @foreach ($event as $item)
            <div
                class="relative max-w-5xl items-center mx-auto bg-white rounded-lg shadow-md overflow-hidden md:flex py-2 px-2 mb-12">
                <!-- Poster/Gambar -->
                <div class="rounded-lg">
                    <img src="/image/Flyer Swimfest 2025.png" alt="Trieste Estate 2016"
                        class="object-cover rounded-lg w-auto w-full md:max-w-[291px]" />
                </div>

                <!-- Detail Turnamen -->
                <div class="p-6 ml-2">
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">
                        {{ $item->eventId->event_name }}
                    </h2>
                    <hr class="border border-t-0 mb-6">
                    <div class="text-[#023f5b] space-y-4 text-lg">
                        <div class="md:flex gap-4">
                            <span>
                                <img src="/image/icon/calendar-dots0.svg" class="mr-1 md:mr-2" alt="">
                            </span>
                            <span class="flex font-bold">
                                Tanggal
                            </span>
                            <span
                                class="md:ml-20">{{ Carbon\Carbon::parse($item->eventId->start_date)->format('d M Y') . ' - ' . Carbon\Carbon::parse($item->eventId->end_date)->format('d M Y') }}</span>
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
                                <button type="button" class="text-blue-500 hover:underline"
                                    onclick="my_modal_4.showModal()">
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
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </form>
                                        </div>
                                        <table
                                            class="table-auto w-full mt-4 text-center border-collapse border-spacing-0">
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
                                                                    <span
                                                                        class="text-green-600 font-bold">&#10003;</span>
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
                                <a href="#" class="text-blue-500 hover:underline ">
                                    {{ $item->eventId->venue }}</a>
                            </ul>
                        </div>
                    </div>
                    <a href="{{ route('detail.lomba', ['slug' => $item->eventId->slug]) }}"
                        class="absolute bottom-6 text-blue-500 font-semibold hover:underline">
                        Lihat Detail >
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Pagination Container -->
    <div class="flex items-center justify-center mb-20">
        <!-- Previous Button -->
        <button class="px-3 py-2 rounded-l-md bg-gray-200 text-gray-700 hover:bg-gray-300">
            &lt;
        </button>

        <!-- Page Numbers -->
        <div class="flex">
            <!-- First Page -->
            <a href="#" class="px-3 py-2 text-blue-800 font-semibold bg-white hover:bg-gray-100">1</a>

            <!-- Dots -->
            <span class="px-3 py-2 bg-white">.</span>
            <span class="px-3 py-2 bg-white">.</span>
            <span class="px-3 py-2 bg-white">.</span>

            <!-- Last Page -->
            <a href="#" class="px-3 py-2 text-blue-800 font-semibold bg-white hover:bg-gray-100">12</a>
        </div>

        <!-- Next Button -->
        <button class="px-3 py-2 rounded-r-md bg-gray-200 text-gray-700 hover:bg-gray-300">
            &gt;
        </button>
    </div>
</section>
<script>
    // dropdown
    document.addEventListener("DOMContentLoaded", () => {
        const menuButton = document.getElementById("menu-button");
        const dropdownMenu = document.getElementById("dropdown-menu");

        // Toggle dropdown visibility on button click
        menuButton.addEventListener("click", () => {
            dropdownMenu.classList.toggle("hidden");
        });

        // Close dropdown if clicking outside
        document.addEventListener("click", (event) => {
            if (!menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    });
</script>
@include('Partials.footer')

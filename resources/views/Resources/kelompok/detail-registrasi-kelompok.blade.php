@include('Partials.header')
@include('Partials.nav-blue')
<section class="relative bg-[#DAF3FF] overflow-hidden min-h-screen">

    <div class="relative container mx-auto py-12 px-6 md:px-20 h-full z-10">
        <div class="flex justify-center py-6">
            <h1 class="text-3xl font-bold text-[#023f5b]">PENDAFTARAN</h1>
        </div>

        <div class="relative max-w-4xl mx-auto bg-white rounded-2xl shadow-lg py-8 px-8">
            <!-- Header Form -->
            <div class="w-full mb-8">
                <div class="flex justify-between">
                    <h3 class="text-lg font-bold text-[#023f5b] mb-2">
                        Pendaftaran Kelompok
                    </h3>
                    <h3 class="text-lg text-[#023f5b] font-bold mb-4">4/6</h3>
                </div>
                <div class="mb-10">
                    @include('Partials.progress-bar-kelompok')
                </div>
            </div>
            <hr class="border border-b-0 mb-8">
            <!-- Form Fields -->
            <div class="space-y-4">
                <!-- Nama -->


                <div class="mb-3">
                    <p class="text-sm font-medium text-[#023f5b]">Nama</p>
                    <p class="text-gray-500">{{ $reg->participant_name }}</p>

                </div>
                <!-- Jenis Kelamin -->
                <div class="mb-3">
                    <p class="text-sm font-medium text-[#023f5b]">Jenis Kelamin</p>
                    <p class="text-gray-500">{{ $reg->gender == 'l' ? 'Laki-laki' : 'Perempuan' }}</p>

                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <p class="text-sm font-medium text-[#023f5b]">Tanggal Lahir</p>
                    <p class="text-gray-500">
                        {{ Carbon\Carbon::parse($reg->date_of_birth)->translatedFormat('d F Y') }}</p>

                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <p class="text-sm font-medium text-[#023f5b]">Alamat</p>
                    <p class="text-gray-500">
                        {{ strtoupper($reg->address) }}, {{ strtoupper($reg->district) }},
                        {{ strtoupper($reg->city) }},
                        {{ strtoupper($reg->province) }}
                    </p>

                </div>

                <!-- Asal Sekolah -->
                <div class="mb-3">
                    <p class="text-sm font-medium text-[#023f5b]">Asal Sekolah</p>
                    <p class="text-gray-500">{{ $reg->school }}</p>

                </div>

                <!-- Email -->
                <div class="mb-6">
                    <p class="text-sm font-medium text-[#023f5b]">Email</p>
                    <p class="text-gray-500">{{ $reg->email }}</p>

                </div>
                <p class="text-sm font-medium text-[#023f5b]">Kelas dan Kategori</p>
                <div class="flex">
                    <div>
                        @foreach ($kelas as $class)
                            <p class="text-gray-500">
                                {{ $class->class_name }} :
                            </p>
                        @endforeach
                    </div>
                    <div class="flex">
                        <div class="ml-6">
                            @foreach ($category as $categories)
                                <p class="text-gray-500">
                                    {{ $categories->category_name }}
                                </p>
                            @endforeach
                        </div>
                        <div class="ml-6">
                            @foreach ($record as $jarak)
                                <p class="text-gray-500">
                                    {{ $jarak->jarak }}
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <p class="text-sm font-medium text-[#023f5b]">Catatan waktu terakhir</p>
                    @foreach ($record as $rec)
                        <p class="text-gray-500">
                            {{ $rec->last_record ? $rec->last_record . ' ' : 'Belum ada catatan waktu' }}
                        </p>
                    @endforeach
                </div>
            </div>
            <hr class="border border-b-0 mt-6">
            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row justify-between mt-6">
                <button onclick="goBack()"
                    class="py-3 px-6 text-gray-400 border border-gray-400 rounded-lg text-center font-semibold hover:text-white hover:bg-gray-500 sm:w-48 w-full mb-4 sm:mb-0 sm:mr-8">
                    Kembali
                </button>
                <form action="{{ route('kelompok.listdetail', $event->eventId->slug) }}" method="GET"
                    class="md:w-full">
                    <button
                        class="py-3 px-6 text-white bg-red-500 rounded-lg text-center font-semibold hover:bg-red-600 sm:w-48 md:w-full">
                        SIMPAN
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function goBack() {
        window.route('kelompok.pilihKelas');
    }
</script>
@include('Partials.footer')

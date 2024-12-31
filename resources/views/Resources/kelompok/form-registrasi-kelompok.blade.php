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
                    <h3 class="text-lg text-[#023f5b] font-bold mb-4">2/6</h3>
                </div>
                <div class="mb-10">
                    @include('Partials.progress-bar-kelompok')
                </div>
            </div>
            <hr class="border border-b-0 mb-8">
            <h3 class="text-2xl font-semibold text-[#023f5b] mb-6">
                Informasi Pribadi
            </h3>
            <!-- Form Section -->
            <form action="{{ route('kelompok.post', $event->eventId->slug) }}" method="POST" class="space-y-6"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="nama" class="block text-sm font-semibold text-gray-800">Nama</label>
                    <input type="text" placeholder="Taufik Hidayat" maxlength="60" id="nama"
                        name="participant_name"
                        class="mt-1 font-semibold p-3 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                    @error('partifipant_nama')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Jenis Kelamin</label>
                    <div class="flex flex-row space-x-4">
                        <div class="basis-1/2 flex items-center border border-gray-300 rounded-lg p-3">
                            <input type="radio" id="laki-laki" value="l" name="gender"
                                class="h-4 w-4 text-blue-600  rounded-full focus:ring-blue-500">
                            <label for="laki-laki" class="ml-2 text-sm text-gray-800">Laki-Laki</label>
                        </div>
                        <div class="basis-1/2 flex items-center border border-gray-300 rounded-lg p-3">
                            <input type="radio" id="perempuan" value="p" name="gender"
                                class="h-4 w-4 text-blue-600 rounded-full focus:ring-blue-500">
                            <label for="perempuan" class="ml-2 text-sm text-gray-800">Perempuan</label>
                        </div>
                        @error('gender')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Tanggal Lahir -->
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Tanggal Lahir</label>
                    <div class="grid grid-cols-3 gap-4">
                        <select name="date"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                            <option value="" selected>Pilih Tanggal</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        <select name="month"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                            <option value="" selected>Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <input type="text" inputmode="numeric" pattern="\d{4}" placeholder="2008" name="year"
                            minlength="4" maxlength="4"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            min="4" required>
                    </div>
                </div>

                <!-- Alamat -->
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Alamat</label>
                    <input type="text" name="address" placeholder="Kp. Rawa Rotan RT. 04/01 Ds. Rawa Rotan"
                        maxlength="100"
                        class="mb-2 w-full border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                    <div class="grid grid-cols-2 gap-2">
                        <select id="provinsi" name="province"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                            <option value="" selected>Pilih Provinsi</option>
                            @foreach ($provinsi as $prov)
                                <option value="{{ $prov->name }}">{{ $prov->name }}</option>
                            @endforeach
                        </select>
                        <select id="city" name="city"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                            <option value="" selected>Pilih Kabupaten/ Kota</option>
                            <option value=""></option>
                        </select>
                        <select id="district" name="district"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                            <option value="" selected>Pilih Kecamatan</option>
                            <option value=""></option>
                        </select>
                        <input type="text" inputmode="numeric" pattern="\d{5}" name="zip_code"
                            placeholder="43211" maxlength="5"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                    </div>
                    @error('address')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    @error('zip_code')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Asal Sekolah dan Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-800">Tim (Sekolah/Club/Private/Ekskul)</label>
                    <input type="text" name="school" placeholder="SMA 1 Bandung" maxlength="60"
                        class="mt-1 mb-3 block w-full border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    @error('school')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <label class="block text-sm font-semibold text-gray-800">Email</label>
                    <input type="email" name="email" placeholder="taufikhidayat45@gmail.com" max="50"
                        class="mt-1 block w-full border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Lampiran --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-800">Lampiran</label>
                    <div
                        class="mt-1 mb-3 block w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                        <!-- Label untuk file input -->
                        <label for="file-input-1" class="flex items-center space-x-2 text-[#023f5b] cursor-pointer">
                            <i class="fas fa-paperclip mr-2"></i>
                            <span class="font-semibold">Akta Kelahiran</span>
                        </label>
                        <p id="file-name-1" class="text-gray-400 text-sm ml-5">Max size 5MB</p>
                        <input type="file" accept=".pdf, .jpg, .jpeg" id="file-input-1" name="file_akte"
                            class="mt-1 hidden border-none p-0 opacity-0 cursor-pointer" onchange="updateFileName(1)">
                        @error('file_akte')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div
                        class="mt-1 block w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <label for="file-input-2" class="flex items-center space-x-2 text-[#023f5b] cursor-pointer">
                            <i class="fas fa-paperclip mr-2"></i>
                            <span class="font-semibold">Upload Raport Terakhir</span>
                        </label>
                        <p id="file-name-2" class="text-gray-400 text-sm ml-5">Max size 5MB</p>

                        <input type="file" accept=".pdf, .jpg, .jpeg" id="file-input-2" name="file_raport"
                            class="mt-1 hidden border-none p-0 opacity-0 cursor-pointer" onchange="updateFileName(2)">
                        @error('file_raport')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <hr class="border border-b-0 mb-8">
                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row justify-between mt-20">
                    <button onclick="goBack()"
                        class="py-3 px-6 text-gray-400 border border-gray-400 rounded-lg text-center font-semibold hover:text-white hover:bg-gray-500 sm:w-48 w-full mb-4 sm:mb-0 sm:mr-8">
                        Kembali
                    </button>
                    <button
                        class="py-3 px-6 text-white bg-red-500 rounded-lg text-center font-semibold hover:bg-red-600 sm:w-48 md:w-full">
                        Selanjutnya
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    function goBack() {
        window.route('registrasi.kategori');
    }
</script>
<script>
    function updateFileName(inputNumber) {
        const fileInput = document.querySelectorAll('input[type="file"]')[inputNumber - 1];
        const fileName = fileInput.files[0] ? fileInput.files[0].name : 'No file chosen';
        const fileNameParagraph = document.getElementById(`file-name-${inputNumber}`);
        fileNameParagraph.textContent = fileName;
    }
</script>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous"></script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    });
    $(function() {
        $('#provinsi').on('change', function() {
            let id_provinsi = $('#provinsi').val();
            console.log(id_provinsi);
            $.ajax({
                type: 'post',
                url: "{{ route('getKabupaten') }}",
                data: {
                    id_provinsi: id_provinsi
                },
                cache: false,

                success: function(data) {
                    $('#city').html(data);
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })
    });
    $(function() {
        $('#city').on('change', function() {
            let id_kabupaten = $('#city').val();
            $.ajax({
                type: 'post',
                url: "{{ route('getKecamatan') }}",
                data: {
                    id_kabupaten: id_kabupaten
                },
                cache: false,

                success: function(data) {
                    $('#district').html(data);
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })
    });
</script>
<script>
    document.querySelector('input[name="year"]').addEventListener('input', function() {
        const value = this.value.trim();
        if (!/^\d{0,4}$/.test(value)) {
            this.value = value.slice(0, -1);
        }
    });
    document.querySelector('input[name="zip_code"]').addEventListener('input', function() {
        const value = this.value.trim();
        if (!/^\d{0,5}$/.test(value)) {
            this.value = value.slice(0, -1);
        }
    });
</script>
@include('Partials.footer')

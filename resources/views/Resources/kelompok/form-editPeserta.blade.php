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
                <h3 class="text-2xl font-bold text-[#023f5b] mb-2">
                    Edit Peserta Kelompok
                </h3>
            </div>
            <hr class="border border-b-0 mb-8">
            <h3 class="text-2xl font-semibold text-[#023f5b] mb-6">
                Informasi Pribadi
            </h3>
            <!-- Form Section -->
            <form action="{{ route('editPeserta.post', [$participant->id, $event->eventId->slug]) }}" method="POST"
                class="space-y-6" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="nama" maxlength="60" class="block text-sm font-semibold text-gray-800">Nama</label>
                    <input type="text" placeholder="Taufik Hidayat" id="nama"
                        value="{{ $participant->participant_name }}" name="participant_name"
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
                        <div class="basis-1/2 flex items-center border  border-gray-300 rounded-lg p-3">
                            <input type="radio" id="laki-laki" value="l" name="gender"
                                value="{{ $participant->school }}"
                                class="h-4 w-4 text-blue-600  rounded-full focus:ring-blue-500"
                                {{ old('gender', $participant->gender) == 'l' ? 'checked' : '' }}>
                            <label for="laki-laki" class="ml-2 text-sm text-gray-800">Laki-Laki</label>
                        </div>
                        <div class="basis-1/2 flex items-center border border-gray-300 rounded-lg p-3">
                            <input type="radio" id="perempuan" value="p" name="gender"
                                class="h-4 w-4 text-blue-600 rounded-full focus:ring-blue-500"
                                {{ old('gender', $participant->gender) == 'p' ? 'checked' : '' }}>
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
                            class="border border-gray-300  p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                            <option value=""
                                {{ old('date', substr($participant->date_of_birth, 0, 2)) == '' ? 'selected' : '' }}>
                                Pilih Tanggal</option>
                            @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}"
                                    {{ old('date', substr($participant->date_of_birth, 0, 2)) == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                    {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                </option>
                            @endfor
                        </select>
                        <select name="month"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                            <option value=""
                                {{ old('month', substr($participant->date_of_birth, 5, 2)) == '' ? 'selected' : '' }}>
                                Pilih Bulan</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}"
                                    {{ old('date', substr($participant->date_of_birth, 5, 2)) == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                    {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                </option>
                            @endfor
                        </select>
                        <input type="text" inputmode="numeric" pattern="\d{4}" placeholder="2008" name="year"
                            minlength="4" maxlength="4" value="{{ substr($participant->date_of_birth, 0, 4) }}"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            min="4" required>
                        @error('date_of_birth')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Alamat -->
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Alamat</label>
                    <input type="text" name="address" placeholder="Kp. Rawa Rotan RT. 04/01 Ds. Rawa Rotan"
                        maxlength="100" value="{{ $participant->address }}"
                        class="mb-2 w-full border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                    <div class="grid grid-cols-2 gap-2">
                        <select id="provinsi" name="province"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                            <option value="" selected>Pilih Provinsi</option>
                            @foreach ($provinsi as $prov)
                                <option value="{{ $prov->name }}"
                                    {{ old('province', $participant->province) == $prov->name ? 'selected' : '' }}>
                                    {{ $prov->name }}</option>
                            @endforeach
                        </select>
                        <select id="city" name="city"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                            <option value="" selected>Pilih Kabupaten/ Kota</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->name }}"
                                    {{ old('city', $participant->city) == $city->name ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                        <select id="district" name="district"
                            class="border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                            <option value="" selected>Pilih Kecamatan</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->name }}"
                                    {{ old('district', $participant->district) == $district->name ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" inputmode="numeric" pattern="\d{5}" name="zip_code" placeholder="43211"
                            maxlength="5" value="{{ $participant->zip_code }}"
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
                    <label class="block text-sm font-semibold text-gray-800">Team (Sekolah/Group/Ekskul)</label>
                    <input type="text" name="school" placeholder="SMA 1 Bandung" maxlength="60"
                        value="{{ $participant->school }}"
                        class="mt-1 mb-3 block w-full border border-gray-300 p-3 font-semibold rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    @error('school')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <label class="block text-sm font-semibold text-gray-800">Email</label>
                    <input type="email" name="email" placeholder="taufikhidayat45@gmail.com" maxlength="50"
                        value="{{ $participant->email }}"
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

                        <label for="file-input-1" class="flex items-center space-x-2 text-[#023f5b] cursor-pointer">
                            <i class="fas fa-paperclip mr-2"></i>
                            <span class="font-semibold">Akta Kelahiran</span>
                        </label>
                        <p id="file-name-1" class="text-gray-400 text-sm ml-5">
                            @if ($participant->file_akte)
                                <a href="{{ Storage::url($participant->file_akte) }}" target="_blank"
                                    class="text-gray-400">
                                    {{ basename($participant->file_akte) }}
                                </a>
                            @else
                                Max size 5MB
                            @endif
                        </p>
                        <input type="file" accept=".pdf, .jpg, .jpeg" id="file-input-1"
                            value="{{ old('file_akte', '') }}" name="file_akte"
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
                        <p id="file-name-2" class="text-gray-400 text-sm ml-5">
                            @if ($participant->file_raport)
                                <a href="{{ Storage::url($participant->file_raport) }}" target="_blank"
                                    class="text-gray-400">
                                    {{ basename($participant->file_raport) }}
                                </a>
                            @else
                                Max size 5MB
                            @endif
                        </p>
                        <input type="file" accept=".pdf, .jpg, .jpeg" id="file-input-2"
                            value="{{ old('file_raport', '') }}" name="file_raport"
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

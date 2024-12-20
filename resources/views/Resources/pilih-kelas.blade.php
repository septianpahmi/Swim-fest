@include('Partials.header')
@include('Partials.nav-blue')
<section class="relative bg-[#DAF3FF] overflow-hidden min-h-screen">
    <div class="relative container mx-auto py-12 px-6 md:px-20 h-full z-10">
        <div class="relative max-w-2xl mx-auto bg-white rounded-2xl shadow-lg py-8 px-8">
            <div class="w-full mb-8">
                <h3 class="text-2xl text-[#023f5b] font-bold mb-4">4/6</h3>
                <div class="mb-4">
                    @include('Partials.progress-bar')
                </div>
                <h3 class="text-xl font-bold text-[#023f5b] mb-2">
                    Kategori & Kelas
                </h3>
            </div>
            <hr class="border border-b-1 border-grey mb-4">
            <!-- Form Fields -->
            <div class="space-y-4">
                <!-- Kelas -->
                <div>
                    <label class="block text-sm font-medium text-[#023f5b] mb-2">Kelas</label>
                    <select id="kelas"
                        class="w-full border-2 p-2 border-grey rounded-lg focus:ring-[#023f5b] focus:border-[#023f5b]"
                        required>
                        <option value="">Pilih Kelas</option>
                        <option>{{ $event->categoryClass->classes->class_name }} :
                            {{ $event->categoryClass->category->category_name }}
                        </option>
                    </select>
                </div>
                <!-- Pilih Nomor -->
                <div>
                    <label class="block text-sm font-medium text-[#023f5b] mb-2">Pilih Nomor</label>
                    <select id="nomor"
                        class="w-full border-2 p-2 border-grey rounded-lg focus:ring-[#023f5b] focus:border-[#023f5b]"
                        required>
                        <option value="">Pilih Nomor</option>
                        <option>01</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#023f5b] mb-2">Catatan Waktu Terakhir
                        (Opsional)</label>
                    <input type="text" id="waktu" placeholder="Detik"
                        class="w-full border-2 p-2 border-grey rounded-lg focus:ring-[#023f5b] focus:border-[#023f5b]">
                </div>
            </div>
            <div class="mt-6 mb-4">
                <button
                    class="w-full py-3 px-6 border-2 p-1 border-solid border-grey text-[#023f5b] rounded-lg text-center font-semibold hover:bg-[#012f44]">
                    <i class="fas fa-user-plus"></i> Tambah Nomor Renang
                </button>
            </div>
            <hr class="border border-b-0 my-6">
            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row justify-between mt-20">
                <button type="button"
                    class="py-3 px-6 text-gray-400 border border-gray-400 rounded-lg text-center font-semibold hover:text-white hover:bg-gray-500 sm:w-48 w-full mb-4 sm:mb-0 sm:mr-8"
                    onclick="goBack()">
                    Kembali
                </button>
                <button
                    class="py-3 px-6 text-white bg-red-500 rounded-lg text-center font-semibold hover:bg-red-600 sm:w-48 md:w-full">
                    Selanjutnya
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    function goBack() {
        window.route('mandiri.file');
    }
</script>
@include('Partials.footer')

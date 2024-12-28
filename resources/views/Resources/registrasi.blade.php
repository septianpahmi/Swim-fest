@include('Partials.header')
@include('Partials.nav-blue')
<section class="relative bg-[#DAF3FF] overflow-hidden min-h-screen">
    <div class="relative container mx-auto py-12 px-6 md:px-20 h-full z-10">
        <div class="flex justify-center py-6">
            <h1 class="text-3xl font-bold text-[#023f5b]">PENDAFTARAN</h1>
        </div>

        <div class="relative max-w-5xl mx-auto h-auto bg-white rounded-lg shadow-lg py-12 px-12">
            <!-- Detail Pendaftaran -->
            <div class="w-full">
                <h3 class="text-2xl text-[#023f5b] font-bold mb-4">1/6</h3>
                <div class="mb-10">
                    @include('Partials.progress-bar')
                </div>
                <h2 class="text-3xl font-bold text-[#023f5b] mb-8">Tipe Pendaftaran</h2>
                <hr>
                <!-- Tipe Pendaftaran -->
                <div class="mb-8 pt-8">
                    <form id="selection-form" method="GET" action="">
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Card Mandiri -->
                            <label for="mandiri" class="cursor-pointer">
                                <input type="radio" id="mandiri" name="category" value="mandiri" class="hidden">
                                <div
                                    class="radio-card flex flex-col items-start border-2 border-[#023f5b] rounded-lg p-4 text-[#023f5b]">
                                    <div class="flex items-center">
                                        <span class="inline-block rounded-full p-2 mr-3">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <h3 class="font-bold">Mandiri</h3>
                                    </div>
                                    <p class="text-sm ml-10">Daftarkan diri Anda</p>
                                </div>
                            </label>

                            <!-- Card Kelompok -->
                            <label for="kelompok" class="cursor-pointer">
                                <input type="radio" id="kelompok" name="category" value="kelompok" class="hidden">
                                <div
                                    class="radio-card flex flex-col items-start border-2 border-[#023f5b] rounded-lg p-4 text-[#023f5b]">
                                    <div class="flex items-center">
                                        <span class="inline-block rounded-full p-2 mr-3">
                                            <i class="fas fa-users"></i>
                                        </span>
                                        <h3 class="font-bold">Kelompok</h3>
                                    </div>
                                    <p class="text-sm ml-12">Daftarkan lebih dari satu orang</p>
                                </div>
                            </label>
                        </div>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row justify-between mt-20">
                            <button type="button" onclick="goBack()"
                                class="py-3 px-6 text-gray-400 border border-gray-400 rounded-lg text-center font-semibold hover:text-white hover:bg-gray-500 sm:w-48 w-full mb-4 sm:mb-0 sm:mr-8">
                                Kembali
                            </button>
                            <button type="submit"
                                class="py-3 px-6 text-white bg-red-500 rounded-lg text-center font-semibold hover:bg-red-600 sm:w-48 md:w-full">
                                Selanjutnya
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('selection-form').addEventListener('submit', function(e) {
        const selectedCategory = document.querySelector('input[name="category"]:checked');
        if (!selectedCategory) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silakan pilih kategori terlebih dahulu!',
                confirmButtonText: 'OK',
                confirmButtonColor: '#023f5b',
            });
            return false;
        } else {
            const eventSlug = "{{ $event->eventId->slug }}"; // Pass the slug from Blade to JavaScript
            if (selectedCategory.value === 'mandiri') {
                this.action = '/registrasi-kategori/mandiri/' + eventSlug;
            } else if (selectedCategory.value === 'kelompok') {
                this.action = '/registrasi-kategori/kelompok/' + eventSlug;
            }
        }
    });

    function goBack() {
        window.history.back();
    }
</script>
@include('Partials.footer')

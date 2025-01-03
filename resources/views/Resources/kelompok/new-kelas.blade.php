@include('Partials.header')
@include('Partials.nav-blue')
<section class="relative bg-[#DAF3FF] overflow-hidden min-h-screen">
    <div class="relative container mx-auto py-12 px-6 md:px-20 h-full z-10">
        <div class="relative max-w-2xl mx-auto bg-white rounded-2xl shadow-lg py-8 px-8">
            <div class="w-full mb-8">
                <div class="flex justify-between">
                    <h3 class="text-lg font-bold text-[#023f5b] mb-2">
                        Pendaftaran Kelompok
                    </h3>
                    <h3 class="text-lg text-[#023f5b] font-bold mb-4">3/6</h3>
                </div>
                <div class="mb-10">
                    @include('Partials.progress-bar-kelompok')
                </div>
                <h3 class="text-xl font-bold text-[#023f5b] mb-2">
                    Kategori & Kelas
                </h3>
            </div>
            <hr class="border border-b-1 border-grey mb-4">
            <form action="{{ route('kelompok.postKelasnew', $event->eventId->slug) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">

                    <div id="form-container">
                        <!-- Form Awal -->
                        <div class="form-template">
                            <div class="mb-4">
                                <label id="kelas"
                                    class="block text-sm font-medium text-[#023f5b] mb-2">Kelas</label>
                                <select id="kelas" name="category_event_id[]"
                                    class="w-full border-2 p-2 border-grey rounded-lg focus:ring-[#023f5b] focus:border-[#023f5b]"
                                    required>
                                    <option value="" selected>Pilih Kelas</option>
                                    <option value="{{ $event->id }}">{{ $event->categoryClass->classes->class_name }}
                                    </option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-[#023f5b] mb-2">Pilih Nomor</label>
                                <select id="nomor" name="no_participant[]"
                                    class="w-full border-2 p-2 border-grey rounded-lg focus:ring-[#023f5b] focus:border-[#023f5b]"
                                    required>
                                    <option value="" selected>Pilih Nomor</option>
                                    <option value="{{ $event->categoryClass->category->id }}">
                                        {{ $event->categoryClass->category->category_name }}</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-[#023f5b] mb-2">Catatan Waktu Terakhir
                                    (Opsional)</label>
                                <input type="text" id="waktu" name="last_record[]" placeholder="Detik"
                                    class="w-full border-2 p-2 border-grey rounded-lg focus:ring-[#023f5b] focus:border-[#023f5b]">
                            </div>
                            <hr class="border border-b-0 my-6">
                        </div>
                    </div>
                    <div class="mt-6 mb-4">
                        <button id="add-swim-number"
                            class="w-full py-3 px-6 border-2 p-1 border-solid border-grey text-[#023f5b] rounded-lg text-center font-semibold hover:bg-[#012f44] hover:text-white">
                            <i class="fas fa-user-plus"></i> Tambah Nomor Renang
                        </button>
                    </div>
                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row justify-between mt-6">
                        <button type="button"
                            class="py-3 px-6 text-gray-400 border border-gray-400 rounded-lg text-center font-semibold hover:text-white hover:bg-gray-500 sm:w-48 w-full mb-4 sm:mb-0 sm:mr-8"
                            onclick="goBack()">
                            KEMBALI
                        </button>
                        <button type="submit"
                            class="py-3 px-6 text-white bg-red-500 rounded-lg text-center font-semibold hover:bg-red-600 sm:w-48 md:w-full">
                            SELANJUTNYA
                        </button>
                    </div>
            </form>
        </div>
    </div>
</section>
<script>
    document.getElementById('add-swim-number').addEventListener('click', function(event) {
        event.preventDefault();

        const formContainer = document.getElementById('form-container');
        const formTemplate = document.querySelector('.form-template');

        const newForm = formTemplate.cloneNode(true);

        const classLabel = newForm.querySelector('label[id="kelas"]');
        if (classLabel) {
            classLabel.remove();
        }
        const classSelect = newForm.querySelector('select[id="kelas"]');
        if (classSelect) {
            classSelect.remove();
        }
        newForm.querySelectorAll('input, select').forEach(input => {
            if (input.tagName === 'SELECT') {
                input.selectedIndex = 0;
            } else {
                input.value = '';
            }
        });

        // Tambahkan tombol hapus
        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.innerHTML = '<i class="fas fa-trash"></i>';
        removeButton.classList.add('remove-form', 'absolute', 'top-[-20px]', 'right-0', 'px-6', 'py-2',
            'text-red-400', 'hover:text-red-500',
        );

        removeButton.addEventListener('click', function() {
            newForm.remove();
        });

        newForm.style.position = 'relative';
        newForm.appendChild(removeButton);

        // Tambahkan form baru ke container
        formContainer.appendChild(newForm);
    });
</script>
<script>
    function goBack() {
        window.route('kelompok');
    }
</script>
@include('Partials.footer')

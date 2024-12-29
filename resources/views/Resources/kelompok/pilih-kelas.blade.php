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
            <form action="{{ route('kelompok.postKelas', $event->eventId->slug) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">

                    <div id="form-container">
                        <!-- Form Awal -->
                        <div class="form-template">
                            <div class="mb-4">
                                <label id="kelas"
                                    class="block text-sm font-medium text-[#023f5b] mb-2">Kelas</label>
                                <select id="kelas" name="category_event_id"
                                    class="w-full border-2 p-2 border-grey rounded-lg focus:ring-[#023f5b] focus:border-[#023f5b]"
                                    required>
                                    <option value="" selected>Pilih Kelas</option>
                                    @foreach ($kelas as $kel)
                                        <option value="{{ $kel->categoryClass->classes->id }}">
                                            {{ $kel->categoryClass->classes->class_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-[#023f5b] mb-2">Pilih Nomor</label>
                                <select id="nomor" name="no_participant[]"
                                    class="w-full border-2 p-2 border-grey rounded-lg focus:ring-[#023f5b] focus:border-[#023f5b]"
                                    required>
                                    <option value="" selected>Pilih Nomor</option>
                                    @foreach ($category as $categorys)
                                        <option value="{{ $categorys->categoryClass->category->id }}">
                                            {{ $categorys->categoryClass->category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-[#023f5b] mb-2">Catatan Waktu Terakhir
                                    (Opsional)</label>
                                <div class="flex items-center gap-4">
                                    <div class="flex-grow">
                                        <label for="minutes"
                                            class="block mb-1 text-sm font-medium text-[#023f5b]">Menit</label>
                                        <input id="minutes" name="minutes" maxlength="2" value="00"
                                            type="number" min="0" max="59"
                                            class="border rounded-md p-2 w-full text-center" placeholder="MM" />
                                    </div>
                                    <div class="flex-grow">
                                        <label for="seconds"
                                            class="block mb-1 text-sm font-medium text-[#023f5b]">Detik</label>
                                        <input id="seconds" name="seconds" maxlength="2" value="00"
                                            type="number" min="0" max="59"
                                            class="border rounded-md p-2 w-full text-center" placeholder="SS" />
                                    </div>
                                    <div class="flex-grow">
                                        <label for="milliseconds"
                                            class="block mb-1 text-sm font-medium text-[#023f5b]">Milidetik</label>
                                        <input id="milliseconds" name="milliseconds" maxlength="3" value="000"
                                            type="number" min="0" max="999"
                                            class="border rounded-md p-2 w-full text-center" placeholder="MS" />
                                    </div>
                                </div>
                                <input type="hidden" id="last_record" name="last_record[]" />
                            </div>
                            <hr class="border border-b-0 my-6">
                        </div>
                    </div>
                    <div class="mt-6 mb-4">
                        <button id="add-swim-number"
                            class="w-full py-3 px-6 border-2 p-1 border-solid border-grey text-[#023f5b] rounded-lg text-center font-semibold hover:bg-[#012f44] hover:text-white">
                            <i class="fas fa-user-plus"></i> Ayo Tambah Nomor Renang
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
    document.addEventListener("DOMContentLoaded", function() {
        const formContainer = document.getElementById("form-container");
        const formTemplate = document.querySelector(".form-template");

        function updateLastRecord(form) {
            const minutesInput = form.querySelector('input[name="minutes"]');
            const secondsInput = form.querySelector('input[name="seconds"]');
            const millisecondsInput = form.querySelector('input[name="milliseconds"]');
            const lastRecordInput = form.querySelector('input[name="last_record[]"]');

            function calculateLastRecord() {
                let minutes = (minutesInput.value || "0").padStart(2, "0");
                let seconds = (secondsInput.value || "0").padStart(2, "0");
                let milliseconds = (millisecondsInput.value || "0").padStart(3, "0");

                if (parseInt(seconds) > 59) {
                    seconds = "59";
                    secondsInput.value = seconds;
                }
                if (parseInt(milliseconds) > 999) {
                    milliseconds = "999";
                    millisecondsInput.value = milliseconds;
                }

                lastRecordInput.value = `${minutes}:${seconds}:${milliseconds}`;
                console.log(`Updated: ${lastRecordInput.value}`);
            }

            minutesInput.addEventListener("input", calculateLastRecord);
            secondsInput.addEventListener("input", calculateLastRecord);
            millisecondsInput.addEventListener("input", calculateLastRecord);
        }

        document.getElementById('add-swim-number').addEventListener('click', function(event) {
            event.preventDefault();

            const newForm = formTemplate.cloneNode(true);

            const classLabel = newForm.querySelector('label[id="kelas"]');
            if (classLabel) classLabel.remove();
            const classSelect = newForm.querySelector('select[id="kelas"]');
            if (classSelect) classSelect.remove();

            newForm.querySelectorAll('input, select').forEach(input => {
                if (input.tagName === 'SELECT') {
                    input.selectedIndex = 0;
                } else {
                    input.value = '';
                }
            });

            const selectedNomors = Array.from(formContainer.querySelectorAll(
                    'select[name="no_participant[]"]'))
                .map(select => select.value);

            const selectNomor = newForm.querySelector('select[name="no_participant[]"]');
            if (selectNomor) {
                selectNomor.querySelectorAll('option').forEach(option => {
                    if (selectedNomors.includes(option.value)) {
                        option.setAttribute('hidden', 'hidden');
                    }
                });
            }

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.innerHTML = '<i class="fas fa-trash"></i>';
            removeButton.classList.add('remove-form', 'absolute', 'top-[-20px]', 'right-0', 'px-6',
                'py-2',
                'text-red-400', 'hover:text-red-500');

            removeButton.addEventListener('click', function() {
                newForm.remove();
            });

            newForm.style.position = 'relative';
            newForm.appendChild(removeButton);

            formContainer.appendChild(newForm);
            updateLastRecord(newForm);
        });

        updateLastRecord(formTemplate);
    });
</script>

<script>
    function goBack() {
        window.route('kelompok');
    }
</script>
@include('Partials.footer')

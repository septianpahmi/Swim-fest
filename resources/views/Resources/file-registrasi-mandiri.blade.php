@include('Partials.header')
@include('Partials.nav-blue')
<section class="relative bg-[#DAF3FF] overflow-hidden min-h-screen">


    <div class="relative bg-[#DAF3FF] min-h-screen">
        <div class="container mx-auto py-12 px-6 md:px-20 h-full">
            <div class="flex justify-center py-6">
                <h1 class="text-3xl font-bold text-[#023f5b]">PENDAFTARAN</h1>
            </div>

            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg py-8 px-8">
                <!-- Header -->
                <div class="w-full mb-10">
                    <h3 class="text-2xl text-[#023f5b] font-bold mb-4">3/6</h3>
                    <div class="mb-10">
                        @include('Partials.progress-bar')
                    </div>
                    <h2 class="text-3xl font-bold text-[#023f5b]">
                        Lampiran
                    </h2>
                </div>

                <!-- Lampiran Section -->
                <div class="space-y-6 mt-3">
                    <form action="{{ route('mandiri.postFile', $event->eventId->slug) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div
                            class="mt-1 mb-3 block w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                            <!-- Label untuk file input -->
                            <label for="file-input-1" class="flex items-center space-x-2 text-[#023f5b] cursor-pointer">
                                <i class="fas fa-paperclip mr-2"></i>
                                <span class="font-semibold">Akta Kelahiran</span>
                            </label>
                            <p id="file-name-1" class="text-gray-400 text-sm ml-5">No file chosen</p>
                            <input type="file" accept=".pdf" id="file-input-1" name="file_akte"
                                class="mt-1 hidden border-none p-0 opacity-0 cursor-pointer"
                                onchange="updateFileName(1)" required>
                        </div>

                        <div
                            class="mt-1 block w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <label for="file-input-2" class="flex items-center space-x-2 text-[#023f5b] cursor-pointer">
                                <i class="fas fa-paperclip mr-2"></i>
                                <span class="font-semibold">Upload Rapor</span>
                            </label>
                            <p id="file-name-2" class="text-gray-400 text-sm ml-5">No file chosen</p>

                            <input type="file" id="file-input-2" accept=".pdf" name="file_raport"
                                class="mt-1 hidden border-none p-0 opacity-0 cursor-pointer"
                                onchange="updateFileName(2)" required>
                        </div>
                        <!-- Buttons -->
                        <hr class="border border-b-0 mb-8">
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
                    </form>

                </div>
            </div>
        </div>
        <script>
            function updateFileName(inputNumber) {
                const fileInput = document.querySelectorAll('input[type="file"]')[inputNumber - 1];
                const fileName = fileInput.files[0] ? fileInput.files[0].name : 'No file chosen';
                const fileNameParagraph = document.getElementById(`file-name-${inputNumber}`);
                fileNameParagraph.textContent = fileName;
            }
        </script>
        <script>
            function goBack() {
                window.route('mandiri');
            }
        </script>
</section>
@include('Partials.footer')

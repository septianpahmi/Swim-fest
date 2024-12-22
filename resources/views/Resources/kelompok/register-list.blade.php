@include('Partials.header')
@include('Partials.nav-blue')
<section class="relative bg-[#DAF3FF] overflow-hidden min-h-screen">
    <div class="relative container mx-auto py-12 px-6 md:px-20 h-full z-10">
        <div class="relative max-w-2xl mx-auto bg-white rounded-2xl shadow-lg py-8 px-8">
            <!-- Header Form -->
            <div class="w-full mb-8">
                <h2 class="text-2xl font-bold text-[#023f5b] mb-2">
                    Pendaftaran Kelompok
                </h2>
            </div>

            <!-- Peserta Input -->
            <div id="peserta-list" class="space-y-4">
                <div class="flex items-center justify-between border-2 border-grey p-4 rounded-2xl peserta">
                    <div class="flex items-center space-x-2">
                        <img src="image/icon/icon-peserta.png" alt="">
                        <span class="text-[#023f5b] text-lg font-bold">Nama Peserta 1</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <img src="image/icon/icon-pensil.png" alt="" class="edit-peserta cursor-pointer"
                            data-id="1">
                        <img src="image/icon/icon-sampah.png" alt="" class="hapus-peserta cursor-pointer"
                            data-id="1">
                    </div>
                </div>
                <div class="flex items-center justify-between border-2 border-gray p-4 rounded-2xl peserta">
                    <div class="flex items-center space-x-2">
                        <img src="image/icon/icon-peserta.png" alt="">
                        <span class="text-[#023f5b] text-lg font-bold">Nama Peserta 2</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <img src="image/icon/icon-pensil.png" alt="" class="edit-peserta cursor-pointer"
                            data-id="2">
                        <img src="image/icon/icon-sampah.png" alt="" class="hapus-peserta cursor-pointer"
                            data-id="2">
                    </div>
                </div>
            </div>

            <!-- Tambah Peserta -->
            <div class="mt-6 mb-4">
                <button id="tambah-peserta"
                    class="flex justify-center w-full py-3 px-6 border-2 border-gray p-4 rounded-2xl">
                    <div class="mr-2 mt-2">
                        <img src="image/icon/icon-tambah-peserta.png" alt="">
                    </div>
                    <div class="ml-2">
                        <span class="text-[#023f5b] text-lg font-bold">Tambah Nomor Peserta</span>
                    </div>
                </button>
            </div>

            <hr class="border-2 border-grey mt-4 mb-4">

            <!-- Buttons -->
            <div class="flex flex-row">
                <button
                    class="basis-1/2 mr-2 w-full py-3 px-6 text-[#023f5b] border-2 border-gray rounded-lg font-semibold text-lg hover:text-white hover:bg-gray-500">
                    Kembali
                </button>
                <button
                    class="basis-1/4 ml-2 w-full py-3 px-6 text-white bg-red-500 rounded-lg font-semibold hover:bg-red-600"
                    onclick="window.location.href = '#';">
                    SELANJUTNYA
                </button>
            </div>
        </div>
    </div>
</section>
@include('Partials.footer')

<script>
    // Inisialisasi daftar peserta
    const pesertaList = document.getElementById('peserta-list');
    let pesertaCount = 2;

    // Tambah Peserta
    document.getElementById('tambah-peserta').addEventListener('click', () => {
        pesertaCount++;
        const pesertaDiv = document.createElement('div');
        pesertaDiv.className = 'flex items-center justify-between border-2 border-gray p-4 rounded-2xl peserta';
        pesertaDiv.innerHTML = `
            <div class="flex items-center space-x-2">
                <img src="image/icon/icon-peserta.png" alt="">
                <span class="text-[#023f5b] text-lg font-bold">Nama Peserta ${pesertaCount}</span>
            </div>
            <div class="flex items-center space-x-2">
                <img src="image/icon/icon-pensil.png" alt="" class="edit-peserta cursor-pointer" data-id="${pesertaCount}">
                <img src="image/icon/icon-sampah.png" alt="" class="hapus-peserta cursor-pointer" data-id="${pesertaCount}">
            </div>
        `;
        pesertaList.appendChild(pesertaDiv);
    });

    // Hapus Peserta
    pesertaList.addEventListener('click', (e) => {
        if (e.target.classList.contains('hapus-peserta')) {
            const pesertaDiv = e.target.closest('.peserta');
            pesertaList.removeChild(pesertaDiv);
        }
    });

    // Edit Peserta
    pesertaList.addEventListener('click', (e) => {
        if (e.target.classList.contains('edit-peserta')) {
            const pesertaName = e.target.closest('.peserta').querySelector('span');
            const newName = prompt('Masukkan nama baru:', pesertaName.textContent);
            if (newName) {
                pesertaName.textContent = newName;
            }
        }
    });
</script>

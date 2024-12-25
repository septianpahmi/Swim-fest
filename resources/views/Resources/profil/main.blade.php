@include('partials.header')
@include('partials.nav-blue')
<section class="relative bg-color-white">
    <div class="flex flex-col-2 relative container mx-auto items-center px-6 mt-6 md:px-20 h-full z-10">
        <div class="w-1/2 p-6">
            <h2 class="text-3xl font-bold text-[#023f5b] mb-6">Profil</h2>
            <!-- Sidebar Menu -->
            <aside class="bg-white w-1/2 lg:w-1/4 p-6">
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('pertandingan') }}" class="flex items-center space-x-4 p-2 rounded-md hover:bg-gray-100">
                            <img src="/image/icon/blue-swim.png" alt="" class="w-6 h-6">
                            <span class="text-lg text-[#023f5b] font-semibold">Pertandingan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-4 p-2 rounded-md hover:bg-gray-100">
                            <img src="/image/icon/icon-peserta.png" alt="" class="w-6 h-6">
                            <span class="text-lg text-[#023f5b] font-medium">Profil</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('keamanan')}}" class="flex items-center space-x-4 p-2 rounded-md hover:bg-gray-100">
                            <img src="/image/icon/gembok.png" alt="" class="w-6 h-6">
                            <span class="text-lg text-[#023f5b] font-medium">Keamanan</span>
                        </a>
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="{{ route('logout') }}" 
                            class="flex items-center space-x-4 p-2 rounded-md hover:bg-gray-100"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <img src="/image/icon/keluar.png" alt="Keluar" class="w-6 h-6">
                            <span class="text-lg text-[#023f5b] font-medium">Keluar</span>
                        </a>
                    </li>
                    
                </ul>
            </aside>
        </div>

        <!-- Main Content -->
        <main class="bg-white flex-1 p-6 w-1/2">
            <form class="space-y-4 mt-10">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nama</label>
                    <input type="text" value="Taufiq Hidayat" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Jenis Kelamin</label>
                    <select class="w-full border border-gray-300 rounded-md p-2">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Tanggal Lahir</label>
                    <input type="date" value="1995-12-19" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nomor Telepon</label>
                    <input type="tel" value="085155241666" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600">Simpan</button>
            </form>
        </main>
    </div>
</section>
@include('partials.footer')

@include('Partials.header')
@include('Partials.nav-blue')
<section class="relative bg-color-white">
    <div class="flex flex-col-2 relative container mx-auto items-center px-6 mt-6 md:px-20 h-full z-10">

        <!-- Sidebar Menu -->
        <div class="w-1/2 p-6">
            <h2 class="text-3xl font-bold text-[#023f5b] mb-6">Profil</h2>
            <!-- Sidebar Menu -->
            <aside class="bg-white w-1/2 lg:w-1/4 p-6">
                <ul class="space-y-4">
                    <li>
                        <a href="#" class="flex items-center space-x-4 p-2 rounded-md hover:bg-gray-100">
                            <img src="/image/icon/blue-swim.png" alt="" class="w-6 h-6">
                            <span class="text-lg text-[#023f5b] font-semibold">Pertandingan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profil') }}" class="flex items-center space-x-4 p-2 rounded-md hover:bg-gray-100">
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
            <div class="w-3/4 px-6 py-6 mt-10">
                <!-- Item 1 -->
                <div class="flex items-center mb-3 space-x-4 ml-9">
                    <img src="/image/poster1.png" alt="" class="w-16 object-cover">
                    <div>
                        <h3 class="text-lg font-semibold">Aqua Blaze National Swimming 2024</h3>
                        <div class="flex items-center space-x-2 mt-1">
                            <img src="/image/icon/calendar-dots0.svg" alt="" class="w-4 h-4">
                            <p class="text-sm text-gray-600">12 Desember, 2024 - 13 Desember, 2025</p>
                        </div>
                    </div>
                    <div>
                        <a href="" class="text-black text-xl font-semibold ml-12">&gt;</a>
                    </div>
                </div>
    
                <!-- Item 2 -->
                <div class="flex items-center mb-3 space-x-4 ml-9">
                    <img src="/image/image-250.png" alt="" class="w-16 object-cover">
                    <div>
                        <h3 class="text-lg font-semibold">Aqua Blaze National Swimming 2024</h3>
                        <div class="flex items-center space-x-2 mt-1">
                            <img src="/image/icon/calendar-dots0.svg" alt="" class="w-4 h-4">
                            <p class="text-sm text-gray-600">12 Desember, 2024 - 13 Desember, 2025</p>
                        </div>
                    </div>
                    <div>
                        <a href="" class="text-black text-xl font-semibold ml-12">&gt;</a>
                    </div>
                </div>
    
                <!-- Item 3 -->
                <div class="flex items-center mb-3 space-x-4 ml-9">
                    <img src="/image/poster2.png" alt="" class="w-16 object-cover">
                        <div>
                            <h3 class="text-lg font-semibold">Aqua Blaze National Swimming 2024</h3>
                            <div class="flex items-center space-x-2 mt-1">
                                <img src="/image/icon/calendar-dots0.svg" alt="" class="w-4 h-4">
                                <p class="text-sm text-gray-600">12 Desember, 2024 - 13 Desember, 2025</p>
                            </div>
                        </div>
                        <div>
                            <a href="" class="text-black text-xl font-semibold ml-12">&gt;</a>
                        </div>
                </div>
            </div>
    </section>
</div>
    @include('partials.footer')

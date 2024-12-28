<body>
    <nav class="flex justify-between items-center py-4 px-6 bg-[#023f5b] shadow-md">
        <!-- Logo -->
        <div class="flex items-center">
            <img src="/image/logo/logo-white.png" alt="Logo" class="h-10 mr-2">
        </div>

        <!-- Hamburger Menu (Tombol di Mobile) -->
        <div class="md:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <!-- Ikon Hamburger -->
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Menu Items -->
        <ul id="menu"
            class="hidden md:flex md:space-x-6 md:ml-auto absolute md:static top-16 left-0 w-full md:w-auto bg-[#023f5b] md:bg-transparent shadow-md md:shadow-none">
            <li>
                <a href="{{ route('beranda') }}" class="block py-2 px-4 text-white hover:text-teal-600 ">Beranda</a>
            </li>
            <li>
                <a href="{{ route('perlombaan') }}"
                    class="block py-2 px-4 text-white hover:text-teal-600 border-b-2 border-white">Perlombaan</a>
            </li>
            @if (Auth::check())
                <li>
                    <!-- Logout Button -->
                    <a href="{{ route('profile', Auth::id()) }}"
                        class="block py-2 px-4 text-white border border-white md:rounded-full text-center hover:bg-white hover:text-[#023f5b] md:inline-block md:ml-4">
                        <i class="fas fa-user-circle"></i> Profile
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('signin') }}" class="block py-2 px-4 text-white hover:text-white">Login</a>
                </li>
                <li>
                    <a href="{{ route('signup') }}"
                        class="block py-2 px-4 text-white bg-red-400 rounded-md text-center hover:bg-red-500 md:inline-block md:ml-4">
                        Daftar Sekarang
                    </a>
                </li>
            @endif
        </ul>
    </nav>

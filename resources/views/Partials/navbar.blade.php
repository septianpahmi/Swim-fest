<body>
    <nav class="flex justify-between items-center py-4 px-6 bg-white shadow-md">
        <!-- Logo -->
        <div class="flex items-center">
            <img src="/image/logo/swimfest-primary-logo-10.png" alt="Logo" class="h-10 mr-2">
        </div>

        <div class="md:hidden">
            <button id="menu-toggle" class="text-[#023f5b] focus:outline-none">
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
            class="hidden md:flex md:space-x-6 md:ml-auto absolute md:static top-16 left-0 w-full md:w-auto bg-white md:bg-transparent shadow-md md:shadow-none z-10">
            <li>
                <a href="{{ route('beranda') }}"
                    class="block py-2 px-4 text-[#023f5b] hover:text-teal-600 border-b-2  border-[#023f5b]">Beranda</a>
            </li>
            <li>
                <a href="{{ route('perlombaan') }}"
                    class="block py-2 px-4 text-[#023f5b] hover:text-teal-600">Perlombaan</a>
            </li>
            @if (Auth::check())
                <li>
                    <a href="{{ route('profile', Auth::id()) }}"
                        class="block py-2 px-4 text-[#023f5b] border border-[#023f5b] md:rounded-full text-center hover:bg-[#023f5b] hover:text-white md:inline-block md:ml-4">
                        <i class="fas fa-user-circle"></i> Profile
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('signin') }}" class="block py-2 px-4 text-teal-800 hover:text-[#023f5b]">Login</a>
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
    {{-- <li>
        <!-- Logout Button -->
        <a href="{{ route('logout') }}"
            class="block py-2 px-4 text-[#023f5b] border border-[#023f5b] md:rounded-full text-center hover:text-[#023f5b] md:inline-block md:ml-4"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-right-from-bracket -rotate-180"></i> Log Out
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li> --}}

<nav aria-label="Progress">
    <ol role="list" class="flex flex-row md:flex-row md:space-x-4 space-x-2 space-y-0 md:space-y-0">
        @foreach ([['routes' => ['registrasi.kategori', 'kelompok', 'kelompok.pilihKelas', 'kelompok.detail', 'kelompok.listdetail', 'kelompok.checkoutProccess']], ['routes' => ['kelompok', 'kelompok.pilihKelas', 'kelompok.detail', 'kelompok.listdetail', 'kelompok.checkoutProccess']], ['routes' => ['kelompok.pilihKelas', 'kelompok.detail', 'kelompok.listdetail', 'kelompok.checkoutProccess']], ['routes' => ['kelompok.detail', 'kelompok.listdetail', 'kelompok.checkoutProccess']], ['routes' => ['kelompok.listdetail', 'kelompok.checkoutProccess']], ['routes' => ['kelompok.checkoutProccess']]] as $step)
            <li class="flex-1">
                <div
                    class="group cursor-pointer flex flex-row md:flex-col items-center md:items-start py-2 md:pb-0 border-b-4 md:border-b-0 md:border-t-4
                {{ request()->routeIs(...$step['routes']) ? 'border-green-400' : 'border-blue-300 hover:border-blue-400' }}">
                </div>
            </li>
        @endforeach
    </ol>
</nav>

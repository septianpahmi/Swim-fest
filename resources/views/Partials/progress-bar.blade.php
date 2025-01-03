<nav aria-label="Progress">
    <ol role="list" class="flex flex-row md:flex-row md:space-x-4 space-x-2 space-y-0 md:space-y-0">
        @foreach ([['routes' => ['registrasi.kategori', 'mandiri', 'mandiri.file', 'mandiri.pilihKelas', 'mandiri.Ringkasan', 'mandiri.RingkasanPembayaran']], ['routes' => ['mandiri', 'mandiri.file', 'mandiri.pilihKelas', 'mandiri.Ringkasan', 'mandiri.RingkasanPembayaran']], ['routes' => ['mandiri.file', 'mandiri.pilihKelas', 'mandiri.Ringkasan', 'mandiri.RingkasanPembayaran']], ['routes' => ['mandiri.pilihKelas', 'mandiri.Ringkasan', 'mandiri.RingkasanPembayaran']], ['routes' => ['mandiri.Ringkasan', 'mandiri.RingkasanPembayaran']], ['routes' => ['mandiri.RingkasanPembayaran']]] as $step)
            <li class="flex-1">
                <div
                    class="group cursor-pointer flex flex-row md:flex-row items-center md:items-start py-2 md:pb-0 border-b-4 md:border-b-0 md:border-t-4
                {{ request()->routeIs(...$step['routes']) ? 'border-green-400' : 'border-blue-300 hover:border-blue-400' }}">
                </div>
            </li>
        @endforeach
    </ol>
</nav>

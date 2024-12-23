<nav aria-label="Progress">
    <ol role="list" class="space-y-4 md:flex md:space-x-8 md:space-y-0">
        <li class="md:flex-1">
            <div
                class="group cursor-pointer flex flex-col py-2 pl-4 md:pb-0 md:pl-0 md:pt-4 border-l-4 md:border-l-0 md:border-t-4{{ request()->routeIs('registrasi.kategori', 'kelompok', 'kelompok.detail', 'kelompok.pilihKelas', 'mandiri.Ringkasan', 'mandiri.RingkasanPembayaran') ? ' border-green-400' : ' border-blue-300 hover:border-blue-400' }}">
            </div>
        </li>
        <li class="md:flex-1">
            <div
                class="group cursor-pointer flex flex-col py-2 pl-4 md:pb-0 md:pl-0 md:pt-4 border-l-4 md:border-l-0 md:border-t-4{{ request()->routeIs('kelompok', 'kelompok.detail', 'kelompok.pilihKelas', 'mandiri.Ringkasan', 'mandiri.RingkasanPembayaran') ? ' border-green-400' : ' border-blue-300 hover:border-blue-400' }}">
            </div>
        </li>
        <li class="md:flex-1">
            <div
                class="group cursor-pointer flex flex-col py-2 pl-4 md:pb-0 md:pl-0 md:pt-4 border-l-4  md:border-l-0 md:border-t-4{{ request()->routeIs('kelompok.pilihKelas', 'mandiri.Ringkasan', 'mandiri.RingkasanPembayaran') ? ' border-green-400' : ' border-blue-300 hover:border-blue-400' }}">
            </div>
        </li>
        <li class="md:flex-1">
            <div
                class="group cursor-pointer flex flex-col py-2 pl-4 md:pb-0 md:pl-0 md:pt-4 border-l-4 md:border-l-0 md:border-t-4{{ request()->routeIs('mandiri.pilihKelas', 'mandiri.Ringkasan', 'mandiri.RingkasanPembayaran') ? ' border-green-400' : ' border-blue-300 hover:border-blue-400' }}">
            </div>
        </li>
        <li class="md:flex-1">
            <div
                class="group cursor-pointer flex flex-col py-2 pl-4 md:pb-0 md:pl-0 md:pt-4 border-l-4 md:border-l-0 md:border-t-4{{ request()->routeIs('mandiri.Ringkasan', 'mandiri.RingkasanPembayaran') ? ' border-green-400' : ' border-blue-300 hover:border-blue-400' }}">
            </div>
        </li>
        <li class="md:flex-1">
            <div
                class="group cursor-pointer flex flex-col py-2 pl-4 md:pb-0 md:pl-0 md:pt-4 border-l-4 md:border-l-0 md:border-t-4{{ request()->routeIs('mandiri.RingkasanPembayaran') ? ' border-green-400' : ' border-blue-300 hover:border-blue-400' }}">
            </div>
        </li>
    </ol>
</nav>

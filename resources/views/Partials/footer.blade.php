    {{-- footer --}}
    <footer class="relative p-4 bg-[#023f5b] sm:p-6">
        <!-- Wave Background -->
        <div class="absolute bottom-[-14px] left-[-5px] hidden md:block">
            <img src="/image/icon/bg-footer.png" alt="Wave Bottom Left" class="w-full object-cover">
        </div>

        <div class="relative md:mx-auto max-w-screen-xl py-2 px-4 sm:px-12">
            <div class="md:flex flex justify-between items-center md:justify-between">
                <!-- Logo -->
                <div class="md:mb-0 ">
                    <a href="#" class="flex items-center">
                        <img src="/image/logo/logo-white.png" class="mr-3 md:ml-24 h-15" alt="SwimFest Logo" />
                    </a>
                </div>

                <!-- Kontak -->
                <div class="md:mr-24">
                    <h2 class="hidden md:block mb-2 text-sm font-semibold text-white uppercase">Kontak</h2>
                    <ul class="text-gray-600">
                        <li class="flex mb-2">
                            <a href="#" class="md:mr-1">
                                <img src="/image/icon/whatsapp-logo0.svg" alt="">
                            </a>
                            <a href="#" class="md:mr-1">
                                <img src="/image/icon/instagram-logo0.svg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer Bottom Bar -->
    <div
        class="relative px-4 py-3 w-full bg-[#036E9F] md:flex flex items-center md:items-center justify-center md:justify-center z-10">
        <span class="text-sm text-white text-center">
            © 2024 <a href="#" class="hover:underline">Swimfest Indonesia</a>. All Rights Reserved.
        </span>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.js"></script>
    <script src="/js/style.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        $('.delete').click(function() {
            var dataid = $(this).attr('data-id');
            var url = $(this).attr('url')
            Swal.fire({
                title: "Anda Yakin?",
                text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "" + url + ""

                }

            });
        });
    </script>
    <script>
        $('.status').click(function() {
            var dataid = $(this).attr('data-id');
            var url = $(this).attr('url')
            Swal.fire({
                title: "Anda Yakin?",
                text: "Setelah dirubah, Anda tidak akan dapat memulihkan data ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, change it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "" + url + ""

                }

            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="toastr.js"></script>
    <script>
        @if (Session::has('success'))
            Swal.fire({
                title: "Berhasil!",
                text: "{{ Session::get('success') }}",
                icon: "success"
            });
        @endif
        @if (Session::has('error'))
            toastr.options.closeButton = true;
            toastr.error("{{ Session::get('error') }}", 'Gagal!')
        @endif
    </script>


    </body>

    </html>

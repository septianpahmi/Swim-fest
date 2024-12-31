<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME', 'Default App') }} - Login</title>
    <link rel="shortcut icon" href="/image/logo/swimfest-primary-logo-11.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="toastr.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite('resources/css/app.css')
</head>

<body>
    <section class="relative bg-[#036e9f] overflow-hidden h-screen">
        <div class="flex min-h-screen w-full flex-wrap items-stretch bg-white px-4 sm:px-8 md:py-12">
            <!-- Kolom Form -->
            <div class="w-full md:w-1/2 flex flex-col items-center justify-center">
                <div class="w-full px-4 sm:px-6 lg:w-3/4">
                    <img src="/image/logo/swimfest-primary-logo-10.png" class="mb-6 h-8 sm:h-10" alt="">
                    <h1 class="mb-2 text-2xl sm:text-3xl font-bold text-gray-800">MASUK</h1>
                    <p class="mb-4 text-sm sm:text-base text-gray-800">Masukan kredensial Anda untuk mengakses akun.</p>
                    <a href="{{ route('google.redirect') }}"
                        class="w-full inline-flex items-center justify-center gap-2 font-medium rounded-lg border border-gray-300 text-gray-800 px-4 py-2 sm:py-3"
                        id="LoginGoogle" type="submit">
                        <img src="/image/icon/google.png" class="h-4" alt="">
                        Masuk dengan Google
                    </a>
                    <div class="flex items-center gap-2 my-4 sm:my-6">
                        <hr class="flex-grow border-gray-300">
                        <span class="text-gray-500 text-sm">Atau</span>
                        <hr class="flex-grow border-gray-300">
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4 sm:gap-6">
                        @csrf
                        <div class="relative">
                            <label for="email"
                                class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2">Email</label>
                            <input id="email" name="email" type="email" placeholder="you@example.com"
                                value="{{ old('email') }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2 sm:py-3 text-gray-800 placeholder-gray-500">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative">
                            <label for="password"
                                class="block text-sm font-medium text-gray-700 sm:mb-2">Password</label>
                            <div class="relative">
                                <input id="password" name="password" type="password" placeholder="Your password"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-2 sm:py-3 text-gray-800 placeholder-gray-500">
                                <button type="button" id="togglePassword"
                                    class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                    <i class="fa-solid fa-eye" id="passwordIcon"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full bg-red-400 hover:bg-red-500 text-white rounded-lg px-4 py-2 sm:py-3 font-medium">
                            Masuk
                        </button>
                    </form>
                    <div
                        class="absolute bottom-6 left-1/2 transform -translate-x-1/2 text-gray-600 text-sm text-center md:static md:mt-4 md:translate-x-0 md:bottom-auto">
                        Belum punya akun?
                        <a class="text-indigo-600 underline font-medium" href="{{ route('signup') }}">Daftar</a>
                    </div>
                </div>
            </div>
            <!-- Kolom Gambar -->
            <div class="hidden md:block flex-col rounded-lg justify-center overflow-hidden bg-cover bg-center w-full md:w-1/3"
                style="background-image: url(/image/image-1.png)">
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script>
        const togglePassword = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("password");
        const passwordIcon = document.getElementById("passwordIcon");

        togglePassword.addEventListener("click", () => {
            const type = passwordInput.type === "password" ? "text" : "password";
            passwordInput.type = type;

            passwordIcon.classList.toggle("fa-eye");
            passwordIcon.classList.toggle("fa-eye-slash");
        });
    </script>
</body>

</html>

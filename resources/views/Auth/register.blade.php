<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME', 'Default App') }} - Register</title>
    <link rel="shortcut icon" href="/image/logo/swimfest-primary-logo-11.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body>
    <section class="relative bg-[#036e9f] overflow-hidden min-h-screen">
        <div class="flex min-h-screen justify-center w-full flex-wrap items-stretch bg-white py-6 sm:px-8 md:py-6">
            <!-- Kolom Form -->
            <div class="w-full md:w-1/2 flex flex-col items-center ">
                <div class="w-full px-4 sm:px-6 lg:w-3/4">
                    <img src="/image/logo/swimfest-primary-logo-10.png" class="mb-6 h-8 sm:h-10" alt="">
                    <h1 class="mb-2 text-2xl sm:text-3xl font-bold text-gray-800">DAFTAR AKUN</h1>
                    <p class="mb-4 text-sm sm:text-base text-gray-800">Masukan kredensial Anda untuk mengakses akun.</p>
                    <a href="{{ route('google.redirect') }}"
                        class="w-full inline-flex items-center justify-center gap-2 font-medium rounded-lg border border-gray-300 text-gray-800 px-4 py-2 sm:py-3"
                        id="LoginGoogle" type="submit">
                        <img src="/image/icon/google.png" class="h-4" alt="">
                        Daftar dengan Google
                    </a>
                    <div class="flex items-center gap-2 my-4 sm:my-6">
                        <hr class="flex-grow border-gray-300">
                        <span class="text-gray-500 text-sm">Atau</span>
                        <hr class="flex-grow border-gray-300">
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4 sm:gap-6">
                        @csrf
                        <div class="relative">
                            <label for="nama"
                                class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2">Nama</label>
                            <input id="nama" name="name" type="text" placeholder="Taufik Hidayat"
                                value="{{ old('name') }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2 sm:py-3 text-gray-800 placeholder-gray-500">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
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
                        <div class="relative">
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-700 sm:mb-2">Konfirmasi Password</label>
                            <div class="relative">
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    placeholder="Confirm your password"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-2 sm:py-3 text-gray-800 placeholder-gray-500">
                                <button type="button" id="togglerePassword"
                                    class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                    <i class="fa-solid fa-eye" id="repasswordIcon"></i>
                                </button>
                            </div>
                            @error('password_confirmation')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full bg-red-400 hover:bg-red-500 text-white rounded-lg px-4 py-2 sm:py-3 font-medium">
                            Daftar
                        </button>
                    </form>
                    <div
                        class="absolute bottom-6 left-1/2 transform -translate-x-1/2 text-gray-600 text-sm text-center md:static md:mt-4 md:translate-x-0 md:bottom-auto">
                        Sudah punya akun?
                        <a class="text-indigo-600 underline font-medium" href="{{ route('signin') }}">Masuk</a>
                    </div>
                </div>
            </div>
            <!-- Kolom Gambar -->
            <div class="hidden md:block flex-col rounded-lg justify-center overflow-hidden bg-cover bg-center w-full md:w-1/3"
                style="background-image: url(/image/image-1.png)">
            </div>
        </div>
    </section>

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
    <script>
        const togglerePassword = document.getElementById("togglerePassword");
        const repasswordInput = document.getElementById("password_confirmation");
        const repasswordIcon = document.getElementById("repasswordIcon");

        togglerePassword.addEventListener("click", () => {
            const type = repasswordInput.type === "password" ? "text" : "password";
            repasswordInput.type = type;

            repasswordIcon.reclassList.toggle("fa-eye");
            repasswordIcon.reclassList.toggle("fa-eye-slash");
        });
    </script>
</body>

</html>

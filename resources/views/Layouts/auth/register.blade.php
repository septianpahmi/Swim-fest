<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body>
    <section class="relative bg-[#036e9f] overflow-hidden h-screen">
        <div class="flex min-h-screen w-full flex-wrap items-stretch bg-white px-4 md:py-12">
            <div class=" md:flex md:w-1/2 md:flex-col md:items-center md:justify-center md:ml-12">
                <div class="w-full px-4 text-star text-xs lg:w-3/4">
                    <img src="/image/logo/swimfest-primary-logo-10.png" class="mb-6 h-10" alt="">
                    <h1 class="mb-2 text-3xl font-bold text-gray-800 ">REGISTER</h1>
                    <p class="mb-6 text-sm text-gray-800">Masukan kredensial Anda untuk mengakses akun.
                    </p>
                    <button
                        class="w-full lqd-btn group inline-flex items-center justify-center gap-1.5 font-medium rounded-lg border  border-gray-300  text-gray-800  px-5 py-3"
                        id="LoginGoogle" type="submit"><img src="/image/icon/google.png" class="h-4" alt="">
                        Daftar dengan Google
                    </button>
                    <div class="flex items-center gap-2 my-6">
                        <hr class="flex-grow border-gray-300">
                        <span class="text-gray-500 text-sm-bold">Atau</span>
                        <hr class="flex-grow border-gray-300">
                    </div>
                    <form class="flex flex-col gap-3">
                        <div class="relative">
                            <label
                                class="flex cursor-pointer items-center gap-2 text-xs font-medium leading-none text-gray-700 mb-3"
                                for="nama">
                                <span class="">Nama</span>
                            </label>
                            <input id="nama"
                                class="block peer w-full rounded-lg px-4 py-3 border border-gray-300 bg-white text-gray-800 placeholder-gray-500 transition-colors"
                                name="" type="text" placeholder="Taufik Hidayat">
                        </div>
                        <div class="relative">
                            <label
                                class="flex cursor-pointer items-center gap-2 text-xs font-medium leading-none text-gray-700 mb-3"
                                for="email">
                                <span class="">Email</span>
                            </label>
                            <input id="email"
                                class="block peer w-full rounded-lg px-4 py-3 border border-gray-300 bg-white text-gray-800 placeholder-gray-500 transition-colors"
                                name="" type="email" placeholder="you@example.com">
                        </div>

                        <div class="relative">
                            <label
                                class="flex cursor-pointer items-center gap-2 text-xs font-medium leading-none text-gray-700 mb-3"
                                for="password">
                                <span>Password</span>
                            </label>
                            <div class="relative">
                                <input id="password" type="password"
                                    class="block peer w-full rounded-lg px-4 py-3 border border-gray-300 bg-white text-gray-800 placeholder-gray-500 transition-colors"
                                    name="" placeholder="Your password">
                                <button type="button" id="togglePassword"
                                    class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                    <i class="fa-solid fa-eye" id="passwordIcon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex justify-between gap-2 mb-4">
                            <div class="grow">
                                <div class="relative">
                                    <label
                                        class="flex cursor-pointer items-center gap-2 text-xs font-medium leading-none text-gray-700"
                                        for="remember">
                                        <input id="remember" class="peer rounded border-gray-300" name="remember"
                                            type="checkbox">
                                        <span class="">Saya setuju dengan Syarat & Ketentuan</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button
                            class="lqd-btn group inline-flex items-center justify-center gap-1.5 font-medium rounded-lg transition-all hover:-translate-y-0.5 hover:shadow-xl lqd-btn-primary bg-red-400 text-white hover:bg-red-500 focus-visible:bg-red-500 focus-visible:shadow-red-300/10 px-5 py-3"
                            id="LoginFormButton" type="submit">
                            Masuk
                        </button>
                    </form>
                    <div class="mt-3 text-gray-600 dark:text-gray-400">
                        Sudah punya akun?
                        <a class="font-medium text-indigo-600 underline" href="#">Masuk</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col rounded-lg justify-center overflow-hidden bg-cover bg-center w-full h-40 sm:h-60 md:h-auto md:flex md:w-1/3"
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
</body>

</html>

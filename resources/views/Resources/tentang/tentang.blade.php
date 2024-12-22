<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Tournament</title>
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

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
                    class="block py-2 px-4 text-white hover:text-teal-600">Turnamen</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 text-white hover:text-teal-600">Berita</a>
            </li>
            <li>
                <a href="{{ route('galeri') }}" class="block py-2 px-4 text-white hover:text-teal-600">Galeri</a>
            </li>
            <li>
                <a href="/tentang" class="block py-2 px-4 text-white hover:text-teal-600 border-b-2 border-white">Tentang</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 text-white hover:text-teal-600">Login</a>
            </li>
            <li>
                <a href="#"
                    class="block py-2 px-4 text-white bg-red-400 rounded-md text-center hover:bg-red-500 md:inline-block md:ml-4">
                    Daftar Sekarang
                </a>
            </li>
        </ul>
    </nav>
    <section class="bg-white text-gray-800 p-6">
        <div class="relative container mx-auto items-center px-6 mt-6 md:px-20 min-h-screen z-10">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2">
                    <div class="flex flex-row">
                        <div>
                            <img src="image/logo/swimfest-primary-logo-11.png " class="w-20" alt="">
                        </div>
                        <div class="mt-6 ml-3">
                            <img src="image/logo/swimfest (1).png" alt="">
                        </div>
                    </div>
                    <div class="mt-6">
                        <h2 class="text-3xl font-bold text-[#023f5b] mt-3 mb-3">Memoreble Moments, </h2>
                        <h2 class="text-3xl font-bold text-[#023f5b] mb-6">Future Championship</h2>
                        <p class="text-gray-400 mb-6 text-justify">
                            Swimfest adalah platform turnamen renang yang dirancang untuk semua kalangan, dari pelajar hingga profesional. Kami percaya setiap perenang memiliki potensi besar yang layak untuk ditampilkan di arena kompetisi. <br>
                            Dengan turnamen yang adil dan penuh tantangan, kami memberikan kesempatan bagi setiap atlet untuk mengembangkan kemampuan mereka. Bergabunglah bersama kami dan jadilah bagian dari komunitas yang mendukung perjalananmu menuju prestasi tertinggi!
                        </p>
                        <h3 class="font-bold text-xl text-[#023f5b]">Misi Kami</h3>
                        <p class="text-gray-400 mb-6 mt-2 text-justify">
                            Misi kami sederhana: menciptakan ekosistem kompetisi renang yang inklusif dan berkelanjutan, memberikan platform bagi semua level perenang untuk berkembang, belajar, dan berprestasi. Dengan menghubungkan komunitas renang dari berbagai latar belakang, kami berharap dapat mendorong semangat sportivitas dan keunggulan dalam olahrága ini.
                        </p>
                        <h3 class="font-bold text-xl text-[#023f5b]">Apa Yang Kami Tawarkan</h3>
                        <p class="text-gray-400 mb-6 mt-2 text-justify">
                            * Turnamen Berkala: Kami menyelenggarakan berbagai turnamen yang disesuaikan dengan berbagai tingkat keahlian, memberikan pengalaman kompetisi yang menantang dan mendidik. <br><br><br>
        
                            * Program Pengembangan: Melalui workshop dan sesi pelatihan, kami membantu perenang meningkatkan teknik dan strategi mereka, memaksimalkan potensi di setiap kompetisi <br><br><br>
        
                            Jaringan Komunitas: Bergabunglah dengan komunitas perenang yang suportif, berbagi pengalaman, dan belajar dari satu sama lain, membangun koneksi yang berharga dalam dunia renang.
                        </p>
                    </div>
                </div>
                <div class="md:w-1/2 mt-20 ml-4 pt-4">
                    <img src="image/bg-tentang.png" width="700" alt="Background Image">
                    <h3 class="font-bold text-xl text-[#023f5b] mt-3 ml-3">Mengapa Memilih Kami</h3>
                    <p class="text-gray-400 mb-6 mt-2 text-justify ml-3">
                        Dengan tim yang berpengalaman dalam penyelenggaraan acara olahraga dan pengembangan atlet, kami berkomitmen untuk menyediakan platform yang adil, transparan, dan profesional. Fokus kami adalah pada pertumbuhan setiap individu, memberikan mereka alat dan kesempatan untuk mencapai puncak potensi mereka. <br>
                        Bergabunglah dengan Kami hari ini dan jadilah bagian dari revolusi dalam dunia kompetisi renang. Mari bersama-sama menciptakan gelombang prestasi baru!
                    </p>
                </div>
            </div> 
        </div>
    </section>
    
    
    
    <section class="relative bg-[#DAF3FF] min-h-40-screen">
        <div class="flex justify-between relative container mx-auto items-center mt-6 min-h-40-screen">
            <div class="container mx-auto px-12 md:px-20 py-12">
                <h3 class="font-bold text-2xl text-[#023f5b] mt-3 ml-3">Kontak</h3>
                <h4 class="font-bold text-lg text-[#023f5b] mt-6 ml-3">Alamat</h4>
                <p class="text-[#023f5b] ml-3 mt-2">123 Aqua Lane, Poolside Distric, Swim City, 45678</p>
                <h4 class="font-bold text-lg text-[#023f5b] mt-3 ml-3">Tlepon</h4>
                <p class="text-[#023f5b] ml-3 mt-2">+62 812 3456 7890</p>
                <h4 class="font-bold text-lg text-[#023f5b] mt-3 ml-3">Email</h4>
                <p class="text-[#023f5b] ml-3 mt-2">info@swimeventpro.com</p>
                <h4 class="font-bold text-lg text-[#023f5b] mt-3 ml-3">Sosial Media</h4>
                <ul class="text-gray-600  ml-3 mt-2">
                    <li class="flex mb-2">
                        <a href="#" class="md:mr-4">
                            <img src="/image/icon/blue-wa.png" alt="">
                        </a>
                        <a href="#" class="md:mr-4">
                            <img src="/image/icon/blue-ig.png" alt="">
                        </a>
                        <a href="#" class="md:mr-4">
                            <img src="/image/icon/blue-yt.png" alt="">
                        </a>
                        <a href="#" class="md:mr-4">
                            <img src="/image/icon/blue-x.png" alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <iframe class="mx-auto px-12 md:px-20 py-12" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d63400.18381567573!2d107.18390265!3d-6.7072537500000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1734715838510!5m2!1sen!2sid" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    @include('Partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.js"></script>
    <script src="/js/style.js"></script>
</body>

</html>

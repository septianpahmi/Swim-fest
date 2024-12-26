@include('Partials.header')
@include('Partials.nav-blue')
<section class="relative bg-color-white overflow-hidden">
    <div class="relative flex flex-col-2 container mx-auto py-12 px-6 md:px-20 h-screen z-10">
        <div class="flex gap-12 w-full justify-center p-6">
            <ul class="min-w-[230px] inline-block py-5">
                <li id="settingTab"
                    class="tab flex items-center font-semibold text-lg text-gray-800 hover:text-blue-600 bg-gray-300 py-5 px-5 cursor-pointer transition-all">
                    <i class="fas fa-person-swimming"></i>&nbsp; Pertandingan
                </li>
                <li id="homeTab"
                    class="tab flex items-center font-semibold text-lg text-gray-800 hover:text-blue-600 py-5 px-5 cursor-pointer transition-all">
                    <i class="fas fa-user"></i>&nbsp; Profile
                </li>
                <li id="profileTab"
                    class="tab flex items-center font-semibold text-lg text-gray-800 hover:text-blue-600 py-5 px-5 cursor-pointer transition-all">
                    <i class="fas fa-lock"></i>&nbsp; Keamanan
                </li>
                <li id="inboxTab"
                    class="tab flex items-center font-semibold text-lg text-gray-800 hover:text-blue-600 py-5 px-5 cursor-pointer transition-all">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="fas fa-right-from-bracket -rotate-180 status"></i>&nbsp; Logout </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>

            <div class="w-full">
                <div id="settingContent" class="tab-content w-full block mt-8">
                    <h4 class="text-lg font-bold text-gray-600 mb-6">Pertandingan </h4>
                    @if ($data->isEmpty())
                        <p class="text-sm text-gray-600 mt-4">Belum ada pertandingan terdaftar.</p>
                    @else
                        @foreach ($data as $event)
                            <div class="flex items-center mb-3 space-x-4 ml-3">
                                <img src="/image/swimfest-2025.jpeg" alt=""
                                    class="w-16 object-cover rounded-lg">
                                <div>
                                    <a href="{{ route('detail.lomba', $event->eventIds->slug) }}"
                                        class="text-2xl font-semibold hover:underline w-full">{{ $event->eventIds->event_name }}</a>
                                    <div class="flex items-center space-x-2 mt-1">
                                        <i class="fas fa-calendar-days"></i>
                                        <p class="text-sm text-gray-600">
                                            {{ Carbon\Carbon::parse($event->eventIds->start_date)->format('d M Y') . ' - ' . Carbon\Carbon::parse($event->eventIds->end_date)->format('d M Y') }}
                                        </p>
                                    </div>
                                    <div class="flex items-center space-x-2 mt-1">
                                        <i class="fas fa-hashtag"></i>
                                        <p class="text-sm text-gray-600">
                                            {{ $event->no_registration }} | {{ $event->type }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('detail.lomba', $event->eventIds->slug) }}"
                                        class="text-black text-xl font-semibold ml-12">&gt;</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div id="homeContent" class="tab-content w-full hidden mt-8">
                    <h4 class="text-lg font-bold text-gray-600 mb-6">Profil </h4>
                    @include('Resources.profil.profil')
                </div>
                <div id="profileContent" class="tab-content w-full hidden mt-8">
                    <h4 class="text-lg font-bold text-gray-600 mb-6">Keamanan</h4>
                    @include('Resources.profil.keamanan')
                </div>
            </div>
        </div>

    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let tabs = document.querySelectorAll('.tab');
        let contents = document.querySelectorAll('.tab-content');

        tabs.forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                let targetId = tab.id.replace('Tab', 'Content');

                // Hide all content divs
                contents.forEach(function(content) {
                    content.classList.add('hidden');
                });

                // Remove active class from all tabs
                tabs.forEach(function(tab) {
                    tab.classList.remove('text-[#023f5b]', 'bg-gray-300');
                    tab.classList.add('text-gray-800');
                });

                // Show the target content
                document.getElementById(targetId).classList.remove('hidden');

                // Add active class to the clicked tab
                tab.classList.add('text-[#023f5b]', 'bg-gray-300');
                tab.classList.remove('text-gray-800');
            });
        });
    });
</script>
@include('partials.footer')

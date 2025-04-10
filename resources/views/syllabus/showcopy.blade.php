<x-layout>
    <x-slot name="title">Syllabus</x-slot>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <div x-data="videoPlayer" x-init="init()" class="flex flex-col lg:flex-row min-h-screen gap-4 px-4">
        <!-- Botón hamburguesa para móviles -->
        <button
            x-on:click="open = !open"
            type="button"
            class="inline-flex items-center p-2 mt-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        >
            <span class="sr-only">Open sidebar</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
            </svg>
        </button>

        <!-- Sidebar -->
        <aside
            class="w-full md:w-[280px] h-auto transition-transform md:translate-x-0 fixed md:static top-0 left-0 z-40 shrink-0"
            :class="{ 'translate-x-0': open, '-translate-x-full': !open }"
            x-cloak
        >
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-400 dark:bg-gray-800 rounded-md">
                <ul class="space-y-2 font-medium">
                    @foreach($themes as $index => $theme)
                        <li>
                            <a href="{{ route('syllabus.slug', $theme->slug) }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <span class="ms-3">{{ $index + 1 }} - {{ $theme->title }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>

        <!-- Contenido principal -->
        <div class="flex-1 p-4">
            <div class="flex justify-center">
                <h2 class="font-semibold text-gray-800 dark:text-gray-200 mb-5 md:text-7xl text-3xl uppercase">{{ $syllabus->formatted_title }}</h2>
            </div>
            <div class="mt-2 md:text-3xl text-2xl dark:text-white text-center">
                {{ $syllabu->id }} - {{ $syllabu->title }}
            </div>

            <div class="flex flex-col lg:flex-row justify-center gap-6 w-full">
                <!-- Lista de videos -->
                <div class="overflow-auto max-h-96 w-full lg:w-80 mt-10">
                    <ul class="max-w-md mx-auto space-y-4">
                        @foreach ($themes as $theme)
                            @foreach ($theme->videos as $video)
                                <li class="pb-3 sm:pb-4 hover:bg-gray-200 rounded-lg dark:hover:bg-gray-700 p-2 cursor-default relative">
                                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-base font-medium text-gray-900 truncate dark:text-white">
                                                {{ $video->title }}
                                            </p>
                                        </div>
                                        <!-- Ícono animado si el video está activo -->
                                        <template x-if="currentVideo === '{{ $video->code_video }}'">
                                            <div class="flex items-center gap-1">
                                                <div class="w-3 h-3 rounded-full bg-green-500 animate-ping"></div>
                                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                            </div>
                                        </template>
                                    </div>
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>

                <!-- Reproductor de video -->
                <div class="w-full max-w-2xl p-4 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                    <iframe
                        id="vimeoPlayer"
                        src="https://player.vimeo.com/video/{{ $videofirst->code_video }}?autoplay=1"
                        class="w-full aspect-video"
                        allow="autoplay; fullscreen"
                        allowfullscreen
                    ></iframe>
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center uppercase mt-10" x-text="currentTitle"></h2>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://player.vimeo.com/api/player.js"></script>
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('videoPlayer', () => ({
                    open: false,
                    currentVideo: '{{ $videofirst->code_video }}',
                    currentTitle: '{{ addslashes($videofirst->title) }}',
                    player: null,
                    videoList: [
                            @foreach ($themes as $theme)
                            @foreach ($theme->videos as $video)
                        { code: '{{ $video->code_video }}', title: '{{ addslashes($video->title) }}' },
                        @endforeach
                        @endforeach
                    ],

                    init() {
                        const iframe = document.getElementById('vimeoPlayer');
                        this.player = new Vimeo.Player(iframe);

                        this.player.on('ended', () => {
                            this.playNextVideo();
                        });

                        this.player.ready().then(() => {
                            this.player.play();
                        });
                    },

                    playNextVideo() {
                        const currentIndex = this.videoList.findIndex(v => v.code === this.currentVideo);
                        const nextVideo = this.videoList[currentIndex + 1];

                        if (nextVideo) {
                            this.currentVideo = nextVideo.code;
                            this.currentTitle = nextVideo.title;
                            this.player.loadVideo(nextVideo.code).then(() => {
                                this.player.play();
                            }).catch(err => console.error('Load error:', err));
                        } else {
                            alert("🎉 ¡Has terminado todos los videos!");
                        }
                    }
                }));
            });
        </script>
    @endpush
</x-layout>

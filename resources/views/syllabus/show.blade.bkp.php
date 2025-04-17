<x-layout>
    <x-slot name="title">Syllabus</x-slot>

    <!-- Include Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <div x-data="{ open: false }"
         @keydown.window.escape="open = false"
         class="flex flex-col lg:flex-row min-h-screen gap-4 px-4">
        <!-- Hamburger Button (Mobitheme.blade.phple Only) -->
        <button
            x-on:click="open = !open"
            type="button"
            class="inline-flex items-center p-2 mt-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        >
            <span class="sr-only">Open sidebar</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5"/>
            </svg>
        </button>

        <!-- Sidebar -->
        <aside
            id="default-sidebar"
            class="w-full md:w-[280px] h-auto transition-transform md:translate-x-0 fixed md:static top-0 left-0 z-40 shrink-0"
            :class="{ 'translate-x-0': open, '-translate-x-full': !open }"
            x-cloak
        >
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-400 dark:bg-gray-800 rounded-md">
                <ul class="space-y-2 font-medium">

                    @foreach($themes as $index => $theme)

                        <li>
                            <a href="{{route('syllabus.theme', ['slug' => $syllabu->slug, 'theme' => $theme->slug])}}"
                               class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <span class="ms-3">{{ $index + 1 }} - {{ $theme->title }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-4" @mouseenter="open = false">
            <div class="flex justify-center">
                <h2 class="font-semibold text-gray-800 dark:text-gray-200 mb-5 md:text-7xl text-3xl uppercase">{{ $syllabu->formatted_title }}</h2>
            </div>
            <div class="mt-2 md:text-3xl text-2xl dark:text-white text-center mb-10 underline">{{ $theme->title }}</div>
            <div class="flex flex-col lg:flex-row justify-center gap-6 w-full"
                 x-data="videoPlaylist({{ Js::from($videos) }})">

                <!-- Scrollable List -->
                <div class="flex flex-col w-full lg:w-80 mt-10 ml-10">
                    <div class="flex justify-center mb-4">
                        <button
                            @click="autoPlayNext = !autoPlayNext"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition"
                            x-text="autoPlayNext ? '⏩ Automatique' : '🖱 Manuelle'">
                        </button>
                    </div>
                    <div
                        x-ref="scrollContainer"
                        class="w-full max-w-md mx-auto space-y-4 overflow-y-auto px-2 max-h-60 sm:max-h-72 md:max-h-80 lg:max-h-96"
                    >
                        @foreach ($videos as $video)
                            @php
                                $extension = pathinfo($video['url_video'], PATHINFO_EXTENSION);
                            @endphp



                            <div
                                @click="setVideoByUrl('{{ $video['url_video'] }}')"
                                x-bind:ref="currentVideo === '{{ $video['url_video'] }}' ? 'activeVideo' : null"
                                :class="currentVideo === '{{ $video['url_video'] }}' ? 'bg-blue-100 dark:bg-blue-900' : ''"
                                class="item pb-3 sm:pb-4 hover:bg-gray-200 rounded-lg dark:hover:bg-gray-700 p-2 cursor-pointer relative transition"
                            >
                                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-base font-medium text-gray-900 truncate dark:text-white">
                                            {{ $video['title'] }} - {{  $extension }}
                                        </p>
                                    </div>
                                    <template x-if="currentVideo === '{{ $video['url_video'] }}'">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             viewBox="0 0 24 24" class="size-5 text-green-500 animate-pulse">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </template>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>

                <!-- Video Player -->
                <div class="w-full max-w-2xl p-4 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                    <div class="flex justify-center mb-10">
                        <button
                            @click="togglePlayPause"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition"
                            x-text="isPlaying ? '⏸ Pause' : '▶ Reanudar'">
                        </button>
                    </div>
                    <video
                        x-ref="videoPlayer"
                        class="w-full aspect-video"

                        autoplay
                        @ended="handleEnded"
                    >
                        <source :src="currentVideo" type="video/mp4">
                        Tu navegador no soporta el video.
                    </video>
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center uppercase mt-10"
                        x-text="currentTitle"></h2>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function videoPlaylist(themes) {
                const allVideos = themes.map(video => ({
                    url: video.url_video,
                    title: video.title
                }));

                return {
                    videos: allVideos,
                    currentIndex: 0,
                    isPlaying: true,
                    autoPlayNext: true,
                    repeatOnce: false,

                    get currentVideo() {
                        return this.videos[this.currentIndex]?.url || '';
                    },
                    get currentTitle() {
                        return this.videos[this.currentIndex]?.title || '';
                    },

                    init() {
                        this.playCurrent();
                    },

                    handleEnded() {
                        if (this.autoPlayNext) {
                            if (!this.repeatOnce) {
                                this.repeatOnce = true;
                                this.$refs.videoPlayer.currentTime = 0;
                                this.$refs.videoPlayer.play();
                            } else {
                                this.repeatOnce = false;
                                this.nextVideo();
                            }
                        }
                    },

                    playCurrent() {
                        const player = this.$refs.videoPlayer;
                        const source = player.querySelector('source');
                        source.src = this.currentVideo;
                        player.load();
                        //player.play();
                    },

                    nextVideo() {
                        this.currentIndex = (this.currentIndex + 1) % this.videos.length;
                        this.playCurrent();
                        this.scrollToActive();
                    },

                    setVideoByUrl(url) {
                        const index = this.videos.findIndex(video => video.url === url);

                        if (index !== -1) {
                            if (index === this.currentIndex) {
                                this.togglePlayPause();
                                return;
                            }

                            this.currentIndex = index;
                            this.repeatOnce = false;
                            this.playCurrent();
                            this.scrollToActive();
                        }
                    },

                    togglePlayPause() {
                        const player = this.$refs.videoPlayer;
                        if (player.paused) {
                            player.play();
                            this.isPlaying = true;
                        } else {
                            player.pause();
                            this.isPlaying = false;
                        }
                    },

                    scrollToActive() {
                        this.$nextTick(() => {
                            const container = this.$refs.scrollContainer;
                            const items = container.querySelectorAll('div.item');
                            const currentItem = items[this.currentIndex];
                            if (container && currentItem) {
                                const offset = currentItem.offsetTop - container.offsetTop;
                                const scrollTop = offset - (container.clientHeight / 2) + (currentItem.offsetHeight / 2);
                                container.scrollTo({ top: scrollTop, behavior: 'smooth' });
                            }
                        });
                    }
                };
            }
        </script>
    @endpush
</x-layout>

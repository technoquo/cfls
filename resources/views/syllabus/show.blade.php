<x-layout>
    <x-slot name="title">Syllabus</x-slot>

    <!-- Include Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <div
         class="flex flex-col lg:flex-row min-h-screen gap-4 px-4">
        <!-- Main Content -->
        <div class="flex-1 p-4">
            <div class="flex justify-center">

                <h2 class="font-semibold text-gray-800 dark:text-gray-200 mb-5 md:text-7xl text-3xl uppercase">{{ $theme->title }}</h2>
            </div>

            <div class="flex flex-col lg:flex-row justify-center items-start gap-x-4 w-full"
                 x-data="videoPlaylist({{ Js::from($videos) }})">

                    <button
                        onclick="window.history.back()"

                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>


                    </button>

                <!-- Scrollable List -->
                <div class="flex flex-col w-full max-w-xs lg:w-80 mt-4">

                <div class="flex justify-center mb-4 gap-4">
                        <button
                            @click="autoPlayNext = !autoPlayNext"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition"
                            x-text="autoPlayNext ? '⏩ Automatique' : '🖱 Manuelle'">
                        </button>
                        <button
                            @click="toggleSpeed"
                            class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition"
                            x-text="isSlow ? '⏱ Lent' : '🚀 Normal'">
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
                                            {{ $video['title'] }}
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
                <div class="p-4 bg-white rounded-md shadow-md dark:bg-gray-800 w-full max-w-3xl">
                    <div class="flex justify-center mb-10">
                        <button
                            @click="togglePlayPause"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition"
                            x-text="isPlaying ? '⏸ Pause' : '▶ Reprendre '">
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
                    isSlow: false,

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

                        // Reaplicar velocidad lenta si está activa
                        player.onloadedmetadata = () => {
                            player.playbackRate = this.isSlow ? 0.5 : 1.0;
                            if (this.isPlaying) {
                                player.play();
                            }
                        };
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

                    toggleSpeed() {
                        const player = this.$refs.videoPlayer;
                        if (this.isSlow) {
                            player.playbackRate = 1.0;
                        } else {
                            player.playbackRate = 0.5;
                        }
                        this.isSlow = !this.isSlow;
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

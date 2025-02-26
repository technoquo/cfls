<x-layout>
    <x-slot name="title">Titre</x-slot>

    <section class="bg-white dark:bg-gray-900 mb-4" x-data="{
        videoSrc: 'https://player.vimeo.com/video/1047122935',
        skip: 3,
        atBeginning: false,
        atEnd: false,
        next() {
            this.to((current, offset) => current + (offset * this.skip))
        },
        prev() {
            this.to((current, offset) => current - (offset * this.skip))
        },
        to(strategy) {
            let slider = this.$refs.slider
            let current = slider.scrollLeft
            let offset = slider.firstElementChild.getBoundingClientRect().width
            slider.scrollTo({ left: strategy(current, offset), behavior: 'smooth' })
        },
        focusableWhenVisible: {
            'x-intersect:enter'() {
                this.$el.removeAttribute('tabindex')
            },
            'x-intersect:leave'() {
                this.$el.setAttribute('tabindex', '-1')
            },
        },
        disableNextAndPreviousButtons: {
            'x-intersect:enter.threshold.05'() {
                let slideEls = this.$el.parentElement.children
                if (slideEls[0] === this.$el) {
                    this.atBeginning = true
                } else if (slideEls[slideEls.length-1] === this.$el) {
                    this.atEnd = true
                }
            },
            'x-intersect:leave.threshold.05'() {
                let slideEls = this.$el.parentElement.children
                if (slideEls[0] === this.$el) {
                    this.atBeginning = false
                } else if (slideEls[slideEls.length-1] === this.$el) {
                    this.atEnd = false
                }
            },
        },
        changeVideo(newSrc) {
            this.videoSrc = newSrc
        }
    }">
        <div class="max-w-screen-2xl px-4 py-8 mx-auto space-y-12">
            <h2 class="mb-4 text-7xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center uppercase">Titre</h2>
            
            <!-- Main Video Player -->
            <div class="flex justify-center">
                <iframe 
                    :src="videoSrc" 
                    class="md:w-1/2 lg:w-1/2 w-full aspect-video"
                    frameborder="0" 
                    allow="autoplay; fullscreen" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>

        <!-- Carousel -->
        <div class="flex w-full flex-col">
            <div
                x-on:keydown.right="next"
                x-on:keydown.left="prev"
                tabindex="0"
                role="region"
                aria-labelledby="carousel-label"
                class="flex space-x-6"
            >
                <h2 id="carousel-label" class="sr-only" hidden>Carousel</h2>

                <!-- Prev Button -->
                <button
                    x-on:click="prev"
                    class="text-6xl"
                    :aria-disabled="atBeginning"
                    :tabindex="atEnd ? -1 : 0"
                    :class="{ 'opacity-50 cursor-not-allowed': atBeginning }"
                >
                    <span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-800">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </span>
                    <span class="sr-only">Skip to previous slide page</span>
                </button>

                <span id="carousel-content-label" class="sr-only" hidden>Carousel</span>

                <!-- Slider -->
                <ul
                    x-ref="slider"
                    tabindex="0"
                    role="listbox"
                    aria-labelledby="carousel-content-label"
                    class="flex w-full snap-x snap-mandatory overflow-x-scroll"
                >
                    <!-- Slide 1 -->
                    <li x-bind="disableNextAndPreviousButtons" class="flex w-1/3 shrink-0 snap-start flex-col items-center justify-center p-2" role="option">
                        <div class="rounded-lg shadow-sm mt-2 w-1/2 overflow-hidden aspect-square">
                            <img 
                                x-on:click="changeVideo('https://player.vimeo.com/video/827615267')" 
                                class="w-full cursor-pointer" 
                                src="{{ asset('img/fete.jpg') }}" 
                                alt="placeholder image">
                        </div>
                        <button x-bind="focusableWhenVisible" class="p-2 text-3xl text-gray-800 font-medium">Titre</button>
                    </li>

                    <!-- Slide 2 -->
                    <li x-bind="disableNextAndPreviousButtons" class="flex w-1/3 shrink-0 snap-start flex-col items-center justify-center p-2" role="option">
                        <div class="rounded-lg shadow-sm mt-2 w-1/2 overflow-hidden aspect-square">
                            <img 
                                x-on:click="changeVideo('https://player.vimeo.com/video/846956931')" 
                                class="w-full cursor-pointer" 
                                src="{{ asset('img/fete.jpg') }}" 
                                alt="placeholder image">
                        </div>
                        <button x-bind="focusableWhenVisible" class="p-2 text-3xl text-gray-800 font-medium">Titre</button>
                    </li>

                    <!-- Slide 3 -->
                    <li x-bind="disableNextAndPreviousButtons" class="flex w-1/3 shrink-0 snap-start flex-col items-center justify-center p-2" role="option">
                        <div class="rounded-lg shadow-sm mt-2 w-1/2 overflow-hidden aspect-square">
                            <img 
                                x-on:click="changeVideo('https://player.vimeo.com/video/1013144890')" 
                                class="w-full cursor-pointer" 
                                src="{{ asset('img/fete.jpg') }}" 
                                alt="placeholder image">
                        </div>
                        <button x-bind="focusableWhenVisible" class="p-2 text-3xl text-gray-800 font-medium">Titre</button>
                    </li>
                </ul>

                <!-- Next Button -->
                <button
                    x-on:click="next"
                    class="text-6xl"
                    :aria-disabled="atEnd"
                    :tabindex="atEnd ? -1 : 0"
                    :class="{ 'opacity-50 cursor-not-allowed': atEnd }"
                >
                    <span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-800">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </span>
                    <span class="sr-only">Skip to next slide page</span>
                </button>
            </div>
        </div>
    </section>

    @push('scripts')
    <script src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.js"></script>
    @endpush
</x-layout>
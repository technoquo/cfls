@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endpush

<section class="bg-white dark:bg-gray-900 bg-fond-two" {{ $members->status ? '' : 'hidden' }}>
    <div class="grid max-w-screen-2xl px-4 py-12 mx-auto gap-8 lg:grid-cols-12 lg:py-16">
        <!-- Video and Image -->
        <div class="lg:col-span-5 wow animate__animated animate__backInDown" data-wow-duration="1s" data-wow-delay="0.2s">
            <div class="w-full rounded-lg shadow-lg overflow-hidden video-container">
                <video
                    src="{{ $members->video_url }}"
                    controls
                    class="w-full h-auto aspect-video video-element"
                    preload="metadata"
                    aria-label="{{ $members->title }} video"
                ></video>
            </div>
            <div class="flex justify-center mt-6">
                <img
                    src="{{ asset('storage/' . $members->image) }}"
                    alt="{{ $members->title }}"
                    class="w-full max-w-xs h-auto rounded-lg shadow-lg image-element"
                    loading="lazy"
                />
            </div>
        </div>

        <!-- Text and Download Button -->
        <div class="ml-auto place-self-center lg:col-span-7 wow animate__animated animate__bounceInDown" data-wow-duration="1s" data-wow-delay="0.2s">
            <h1 class="responsive-title mb-6 max-w-2xl text-center font-extrabold tracking-tight text-gray-900 dark:text-white uppercase">
                {{ $members->title }}
            </h1>
            <div class="responsive-text prose prose-p:my-2 max-w-2xl mb-6 font-light text-gray-800 dark:text-white members-description mt-8 mx-auto">
                {!! $members->description !!}
            </div>
            <div class="flex items-center justify-center gap-4 mb-6">
                <a
                    href="{{ asset('storage/' . $members->download) }}"
                    target="_blank"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 download-button transition-colors duration-200"
                    aria-label="Télécharger {{ $members->title }}"
                >
                    Téléchargement
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW({
            boxClass: 'wow',
            animateClass: 'animate__animated',
            offset: 100,
            mobile: true,
            live: true
        }).init();
    </script>
@endpush

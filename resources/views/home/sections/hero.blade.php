<section class="bg-white dark:bg-gray-900 mb-4" {{ $history->status ? '' : 'hidden' }}>
    <div class="max-w-screen-2xl mx-auto px-4 py-12 space-y-8">
        <!-- Main Title -->
        <h2 class="responsive-title font-extrabold tracking-tight text-gray-900 dark:text-white text-center">
            {{ $data->name }}
        </h2>

        <!-- Main Description -->
        <div class="responsive-text prose prose-p:my-2 max-w-4xl mx-auto font-light text-gray-800 dark:text-white text-center">
            {!! $data->description !!}
        </div>

        <!-- Responsive Row -->
        <div class="flex flex-col lg:grid lg:grid-cols-2 gap-8 xl:gap-12 items-center">
            <!-- Video Player -->
            <div class="order-1 lg:order-2 w-full">
                <div class="relative w-full pb-[56.25%] h-0 overflow-hidden rounded-lg video-container">
                    <iframe
                        src="https://player.vimeo.com/video/{{ $history->video }}"
                        class="absolute top-0 left-0 w-full h-full video-iframe"
                        frameborder="0"
                        allow="autoplay; fullscreen; picture-in-picture"
                        allowfullscreen
                        title="{{ $history->title }}"
                        loading="lazy"
                    ></iframe>
                </div>
            </div>

            <!-- Description -->
            <div class="order-2 lg:order-1 w-full px-4">
                <h2 class="responsive-subtitle mb-4 font-extrabold tracking-tight text-gray-900 dark:text-white text-center uppercase">
                    {{ $history->title }}
                </h2>
                <hr class="border-b border-gray-200 dark:border-gray-700 my-4" />
                <div class="responsive-text prose prose-p:my-2 font-light text-gray-800 dark:text-white text-center">
                    {!! $history->description !!}
                </div>
            </div>
        </div>
    </div>
</section>

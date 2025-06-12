<section class="bg-white dark:bg-gray-900 mb-4" {{ $history->status ? '' : 'hidden' }}>
    <div class="max-w-screen-2xl mx-auto space-y-12">
        <h2 class="text-xl sm:text-4xl md:text-6xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center">
            {{ $data->name }}
        </h2>

        <div class="font-light lg:text-2xl text-gray-800 dark:text-white text-center">
            {!! $data->description !!}
        </div>

        <!-- Responsive Row -->
        <div class="flex flex-col lg:grid lg:grid-cols-2 xl:gap-16 gap-8 items-center">
            <!-- Video Player -->
            <div class="order-1 lg:order-2 w-full  mt-6">

                <div class="relative w-full pb-[56.25%] h-0 overflow-hidden rounded-lg">
                    <iframe
                        src="https://player.vimeo.com/video/{{ $history->video }}"
                        class="absolute top-0 left-0 w-full h-full"
                        frameborder="0"
                        allow="autoplay; fullscreen; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>
            </div>

            <!-- Description -->
            <div class="order-2 lg:order-1 text-gray-700 sm:text-lg dark:text-gray-400 w-full">
                <h2 class="mb-4 mt-8 md:text-3xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center uppercase">
                    {{ $history->title }}
                </h2>
                <hr class="border-b border-gray-200 dark:border-gray-700 my-5" />
                <p class="font-light lg:text-2xl text-gray-800 dark:text-white text-center">
                    {!! $history->description !!}
                </p>
            </div>
        </div>
    </div>
</section>

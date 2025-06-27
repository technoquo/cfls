<section class="bg-white dark:bg-gray-900 mb-4" {{ $history->status ? '' : 'hidden' }}>
    <div class="max-w-screen-2xl mx-auto px-4 py-12 space-y-8">
{{--        <!-- Main Title -->--}}
{{--        <h2 class="responsive-title text-xl sm:text-4xl md:text-6xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center mb-10">--}}
{{--            {{ $data->name }}--}}
{{--        </h2>--}}

{{--        <!-- Main Description -->--}}
{{--        <div class="lg:text-2xl font-light text-gray-800 dark:text-white text-center">--}}
{{--            {!! $data->description !!}--}}
{{--        </div> --}}

        <!-- Responsive Row -->
        <div class="py-12 space-y-8  mt-5">
            <div class="flex flex-col lg:grid lg:grid-cols-2 gap-8 xl:gap-12 items-center ">
                <!-- Video Player -->
                <div class="order-1 lg:order-2 w-full">
                    <div class="relative w-full pb-[56.25%] h-0 overflow-hidden rounded-lg video-container">
                        <video
                            src="{{ $history->video }}"
                            controls
                            class="w-full h-auto aspect-video video-element"
                            preload="metadata"
                            aria-label="{{ $history->title }} video"
                        ></video>
                    </div>
                </div>

                <!-- Description -->
                <div class="order-2 lg:order-1 w-full px-4">
                    <h2 class="responsive-subtitle mb-4 font-extrabold tracking-tight text-gray-900 dark:text-white text-center uppercase text-3xl sm:text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl md:text-2xl">
                        {{ $history->title }}
                    </h2>
                    <hr class="border-b border-gray-200 dark:border-gray-700 my-4"/>
                    <div
                        class="responsive-text prose prose-p:my-2 font-light md:text-2xl  text-gray-800 dark:text-white text-center">
                        {!! $history->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

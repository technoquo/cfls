@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.core.min.css">
@endpush

<section class="bg- dark:bg-gray-900 mb-4">
    <div class="glide max-w-screen-2xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <!-- Slide 1 -->
                @foreach ($features as $feature)
                <li class="glide__slide">
                    <div class="grid lg:grid-cols-12">
                        <div class="mr-auto place-self-center lg:col-span-7">
                            <h1 class="max-w-2xl mb-4 font-extrabold leading-none tracking-tight text-xl sm:text-2xl md:text-3xl lg:text-5xl dark:text-white">
                                {{ $feature->title }}
                            </h1>
                            <hr class="border-b border-gray-200 dark:border-gray-700 my-5"/>
                            <div class="prose max-w-2xl mb-6 font-light text-gray-800 lg:mb-8 md:text-2xl lg:text-2xl dark:text-white">
                                {!!  $feature->description !!}
                            </div>
                            <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4 mt-4">
                                <a href="{{$feature->link}}" target="{{$feature->target}}" class="inline-flex items-center justify-center w-full px-5 py-3 mb-2 mr-2 text-sm font-medium text-white bg-[#008BCF] border border-gray-200 rounded-lg sm:w-auto focus:outline-none hover:bg-cyan-500 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-[#008BCF] dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">

                                    {{ $feature->button_text }}
                                </a>
                            </div>
                        </div>
                        <div class="lg:mt-0 lg:col-span-5 lg:flex flex justify-center">
                            <img class="w-2/3 h-auto" src="{{ asset('storage/'. $feature->image) }}" alt="{{ $feature->title }}" />
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>

        <!-- Controles de Navegación -->
        <div class="flex justify-center mt-8">
            <div class="glide__arrows flex gap-8" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left bg-csfl hover:bg-cyan-500 p-4 rounded" data-glide-dir="<">
                    <i class="fas fa-chevron-left text-white"></i>
                </button>
                <button class="glide__arrow glide__arrow--right bg-csfl hover:bg-cyan-500 p-4 rounded" data-glide-dir=">">
                    <i class="fas fa-chevron-right text-white"></i>
                </button>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/glide.min.js"></script>
    <script>
        window.initGlide = function () {
            const glideElement = document.querySelector('.glide');
            if (glideElement && !glideElement.classList.contains('glide-initialized')) {
                new Glide('.glide', {
                    type: 'carousel',
                    perView: 1,
                    focusAt: 'center',
                    gap: 0,
                    autoplay: 5000,
                }).mount();

                glideElement.classList.add('glide-initialized');
            }
        };

        document.addEventListener('DOMContentLoaded', window.initGlide);
        document.addEventListener('livewire:navigated', window.initGlide);

    </script>

@endpush

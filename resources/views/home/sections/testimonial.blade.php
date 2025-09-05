<section class="bg-white dark:bg-gray-900 py-12">


    <div class="max-w-screen-xl px-4 mx-auto overflow-hidden relative">
        <h2 class="mb-8 uppercase text-xl sm:text-4xl md:text-6xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center">
            Témoignages
        </h2>
        <hr class="border-b border-gray-200 dark:border-gray-700 my-5">
        <!-- Glide.js Carousel -->
        <div class="glide" x-data x-init="initGlide($el)">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach ($testimonials as $testimonial)
                        <li class="glide__slide text-center px-6 mb-10">
                            <figure class="max-w-screen-md mx-auto">
                                <blockquote>
                                    <p class="text-2xl text-gray-900 dark:text-white italic ">
                                        {{ $testimonial->testimony }}
                                    </p>
                                </blockquote>

                            </figure>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Optional Controls -->
            <div class="glide__bullets mt-4 flex justify-center space-x-2" data-glide-el="controls[nav]">
                @foreach ($testimonials as $index => $testimonial)
                    <button class="glide__bullet" data-glide-dir="={{ $index }}"></button>
                @endforeach
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script>
        function mountGlide(el) {
            new Glide(el, {
                type: 'carousel',
                perView: 1,
                autoplay: 5000,
                hoverpause: true
            }).mount();
        }

        function initGlide(el) {
            // Si ya existe, montar de una
            if (window.Glide) return mountGlide(el);

            // Si no, espera a que cargue el script
            const tryLater = () => {
                if (window.Glide) return mountGlide(el);
                // pequeño backoff
                setTimeout(tryLater, 50);
            };
            tryLater();
        }
    </script>
@endpush

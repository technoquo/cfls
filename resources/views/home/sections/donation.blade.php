@push('css')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
@endpush

<section class="bg-white dark:bg-gray-900 mb-4" {{ $don->status ? '' : 'hidden' }}>
    <div class="max-w-screen-2xl px-4 py-8 mx-auto space-y-12">
        <!-- Responsive Row -->
        <div class="flex flex-col lg:grid lg:grid-cols-2 xl:gap-16 gap-8 items-center">
            <!-- Video Player with Title -->
            <div class="order-1 lg:order-2 w-full wow animate__animated animate__backInRight">

                <video
                    src="{{ $don->video_url }}"
                    controls
                    class="w-full rounded-lg shadow-lg aspect-video"
                ></video>

            </div>

            <!-- Description and Image -->
            <div class="order-2 lg:order-1 text-gray-700 sm:text-lg dark:text-gray-400 w-full wow animate__animated animate__backInLeft">
                <h2 class="mb-4 text-xl sm:text-4xl md:text-6xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center">
                    {{ $don->title }}
                </h2>
                <hr class="border-b border-gray-200 dark:border-gray-700" />
                <div class="flex items-center justify-center">

                </div>
                <p class="mt-8 mb-8 font-light lg:text-2xl text-gray-800 dark:text-white text-center">
                    {!! $don->description !!}
                </p>
                <div class="flex items-center justify-center mb-8">
                <img
                    class="w-52 h-auto max-w-none rounded-md"
                    src="{{ asset('storage/' . $don->image) }}"
                    alt="Don"
                />
                </div>

            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW({
            boxClass: 'wow', // Clase que activa la animación
            animateClass: 'animate__animated', // Clase de animación de Animate.css
            offset: 100, // Distancia desde la parte inferior de la pantalla para activar la animación
            mobile: true, // Activar en dispositivos móviles
            live: true // Detectar cambios en el DOM y animar elementos añadidos dinámicamente
        }).init();
    </script>
@endpush

@push('css')
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>
@endpush
<section class="bg-white dark:bg-gray-900 bg-fond-two {{ $members->status ? '' : 'hidden' }}">
{{--    <div class="max-w-screen-md mx-auto">--}}
{{--        <p class="text-gray-700 sm:text-xl dark:text-gray-400 wow animate__animate animate__fadeInDownBig">--}}
{{--            {{ $members->subtitle }}--}}
{{--        </p>--}}
{{--    </div>--}}

    <div class="grid max-w-screen-2xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <!-- Text & Image -->
        <div class="mr-auto place-self-center lg:col-span-7 wow animate__animate animate__bounceInDown">
            <h1 class="max-w-2xl mb-4 text-xl sm:text-2xl md:text-3xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-extrabold tracking-tight leading-none  uppercase">
                {{ $members->title }}
            </h1>

            <div class="max-w-2xl mb-2 font-light lg:mb-4 md:text-lg lg:text-xl members-description">
                {!! $members->description !!}

            </div>

            <div class="flex items-center gap-4 mb-6">

                <a href="{{ asset('storage/' . $members->download) }}" target="_blank" class="inline-flex items-center justify-center px-5 py-3 text-2xl font-medium text-center rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 ">
                    Téléchargement
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Video -->
        <div class="lg:mt-0 lg:col-span-5 wow animate__animated animate__backInDown">
            <div class="w-full rounded-lg shadow-lg overflow-hidden">
                <video
                    src="{{ $members->video_url }}"
                    controls
                    class="w-full rounded-lg shadow-lg aspect-video">
                </video>
            </div>
            <div class="flex justify-center mt-4">
            <img src="{{ asset('storage/'. $members->image ) }}" alt="membre" class="w-1/2 rounded-lg shadow-lgt">
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
    }).init()
</script>
@endpush

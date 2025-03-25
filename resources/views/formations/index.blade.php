<x-layout>
    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    @endpush
    <x-slot name="title">Formations</x-slot>
    <section>
        @foreach ($formations as $index => $formation)
            @if ($formation->status == 1)
                @if ($index % 2 == 0)
                    <!-- Even index: Image on the left -->
                    <div
                        class="wow animate__animated animate__fadeInUp bg-white dark:bg-gray-900 gap-8 items-center py-8 px-4 xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6 mb-4">
                        <img class="w-full rounded-lg" src="{{ asset('storage/' . $formation->image) }}"
                            alt="{{ $formation->title }}">
                        <div class="mt-4 md:mt-0">
                            <h2
                                class="mb-4 md:text-6xl text-7xl uppercase tracking-tight font-extrabold text-gray-900 dark:text-white">
                                {{ $formation->title }}</h2>
                            {{-- <div class="mb-6 font-light text-gray-500 md:text-2xl dark:text-gray-400">
                                {!! $formation->description !!}
                            </div> --}}
                            <a href="{{ route('formations.slug', ['slug' => $formation->slug]) }}" wire:navigate
                                class="inline-flex items-center text-gray-900 dark:text-csfl bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-2xl px-5 py-2.5 text-center dark:focus:ring-primary-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 -ml-1 w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                  </svg>                                  
                                   Voir plus d'informations                              
                                  
                            </a>
                        </div>
                    </div>
                @else
                    <!-- Odd index: Image on the right -->
                    <div
                        class="wow animate__animated animate__fadeInUp bg-white dark:bg-gray-900 gap-8 items-center py-8 px-4 xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6 mb-4">
                        <div class="mt-4 md:mt-0 ">
                            <h2
                                class="mb-4 md:text-6xl text-7xl uppercase tracking-tight font-extrabold text-gray-900 dark:text-white">
                                {{ $formation->title }}</h2>
                            {{-- <div class="mb-6 font-light text-gray-500 md:text-2xl dark:text-gray-400">
                                {!! $formation->description !!}
                            </div> --}}
                            <a href="{{ route('formations.slug', ['slug' => $formation->slug]) }}" wire:navigate
                                class="inline-flex items-center text-gray-900 dark:text-csfl bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-2xl px-5 py-2.5 text-center dark:focus:ring-primary-900">
                                Voir plus d'informations
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 -mr-1 w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                  </svg>
                                  
                                  
                            </a>
                        </div>
                        <img class="w-full rounded-lg" src="{{ asset('storage/' . $formation->image) }}"
                            alt="{{ $formation->title }}">
                    </div>
                @endif
            @else
                <div class="hidden"></div>
            @endif
        @endforeach    
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
</x-layout>

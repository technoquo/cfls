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
                    <div class="wow animate__animated animate__fadeInUp bg-white dark:bg-gray-900 gap-8 items-center py-8 px-4 xl:gap-16 flex flex-col md:grid md:grid-cols-2 sm:py-16 lg:px-6 mb-4">
                        <!-- Imagen izquierda en desktop -->
                        <div class="order-2 md:order-1 w-full flex flex-col items-center">
                            <img class="w-full rounded-lg mb-4" src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->title }}">
                            <a href="{{ route('formations.slug', ['slug' => $formation->slug]) }}" wire:navigate
                               class="inline-flex items-center text-gray-900 dark:text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg md:text-2xl px-5 py-2.5 text-center dark:focus:ring-primary-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                </svg>

                                Voir plus d'informations
                            </a>
                        </div>

                        <!-- Título -->
                        <h2 class="order-1 md:order-2 w-full text-center mb-4 text-xl sm:text-2xl md:text-3xl lg:text-5xl xl:text-6xl 2xl:text-7xl uppercase tracking-tight font-extrabold text-gray-900 dark:text-white">
                            {{ $formation->title }}
                        </h2>
                    </div>
                @else
                    <!-- Odd index: Image on the right -->
                    <div class="wow animate__animated animate__fadeInUp bg-white dark:bg-gray-900 gap-8 items-center py-8 px-4 xl:gap-16 flex flex-col md:grid md:grid-cols-2 sm:py-16 lg:px-6 mb-4">
                        <!-- Título -->
                        <h2 class="order-1 md:order-1 w-full text-center mb-4 text-xl sm:text-2xl md:text-3xl lg:text-5xl xl:text-6xl 2xl:text-7xl uppercase tracking-tight font-extrabold text-gray-900 dark:text-white">
                            {{ $formation->title }}
                        </h2>

                        <!-- Imagen derecha en desktop -->
                        <div class="order-2 md:order-2 w-full flex flex-col items-center">
                            <img class="w-full rounded-lg mb-4" src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->title }}">
                            <a href="{{ route('formations.slug', ['slug' => $formation->slug]) }}" wire:navigate
                               class="inline-flex items-center text-gray-900 dark:text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg md:text-2xl px-5 py-2.5 text-center dark:focus:ring-primary-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                </svg>
                                Voir plus d'informations

                            </a>
                        </div>
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
        document.addEventListener('livewire:init', () => {
            new WOW({
                boxClass: 'wow',
                animateClass: 'animate__animated',
                offset: 100,
                mobile: true,
                live: true
            }).init();
        });
    </script>
@endpush
</x-layout>

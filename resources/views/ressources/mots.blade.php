<x-layout>
    <x-slot name="title">Mots croisés</x-slot>

    <h1 class="flex justify-center uppercase text-xl sm:text-2xl md:text-3xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-bold dark:text-white">
        Mots croisés
    </h1>

    <section class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-8 mx-auto max-w-screen-2xl">

        @foreach($videos as $croise)
        <div x-data="{ active: 'mots' }"
            class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <div class="relative">
                <div class="absolute right-0 top-0 p-2">
                    <a href="{{asset('storage/'.$croise->pdf)}}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-10 bg-red-500 rounded-full p-2 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                        </svg>
                    </a>
                </div>
                <div class="text-center">
                    <div class="mb-2 mt-3 md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                         {{ $croise->title }}
                    </div>
                </div>
            </div>

            <!-- Imágenes con Alpine.js -->
            <img x-show="active === 'mots'" x-cloak class="rounded-t-lg  w-full h-[350px] bg-white"
                src="{{ asset($croise->image_mot) }}"
                alt="{{ $croise->title }}" />

            <img x-show="active === 'solutions'" x-cloak class="rounded-t-lg w-full h-[350px] bg-white"
                src="{{ asset($croise->image_solution) }}"
                alt="Solutions" />

            <div x-show="active === 'solutions-signees'" x-cloak class="w-full h-[350px]">
                <iframe class="w-full h-full rounded-lg" src="https://player.vimeo.com/video/{{ $croise->code_vimeo }}" frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture" allowfullscreen>
                </iframe>
            </div>

            <!-- Botones de navegación -->
            <div class="flex justify-center items-center mt-3 mb-3 space-x-2">
                <button @click="active = 'mots'"
                    class="px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Mots croisés
                </button>
                <button @click="active = 'solutions'"
                    class="px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Solutions
                </button>
                <button @click="active = 'solutions-signees'"
                    class="px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Solutions signées
                </button>
            </div>
        </div>
        @endforeach






    </section>
</x-layout>

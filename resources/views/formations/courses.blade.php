<x-layout>
    <x-slot name="title">Programme de Cours 2024 - 2025</x-slot>
    <x-menuformation :slug="$slug" />
    <h2 class="mb-8 text-7xl tracking-tight font-extrabold text-gray-900 dark:text-white text-center">Programme de Cours 2024 - 2025</h2>
    <div class="container mx-auto px-4 py-8">
        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
            <!-- Card 1 -->
            <a x-bind:href="false"
                class="flex flex-col items-center rounded-lg border border-gray-200 bg-green-500 hover:bg-green-300 px-4 py-6 transition-colors duration-300 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 cursor-not-allowed opacity-70">
                <img src="{{ asset('img/formations/niveau1.png') }}"
                    alt="placeholder" class="w-full max-w-[250px] sm:max-w-[400px] h-auto object-cover rounded-lg mb-4">

                <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                    Formation à l'année - niveau 1
                </h5>
                <div class="font-normal text-gray-700 dark:text-gray-400 mb-3 text-center text-sm sm:text-base">
                    Du 09/10/2024 au 11/06/2025, tous les mercredis de 11h à 12h30
                </div>
                <p class="font-normal text-gray-700 dark:text-gray-400 mb-3 text-sm sm:text-base">Prix : 190 €</p>
                <div class="text-white bg-red-500 font-medium rounded-lg text-sm px-5 py-2.5">
                    fermé
                </div>
            </a>

            <!-- Card 2 -->
            <a href="{{ route('niveau', ['slug' => $slug ,'nivel' => 'niveau2']) }}"
                class="flex flex-col items-center rounded-lg border border-gray-200 bg-blue-500 px-4 py-6 hover:bg-blue-400 transition-colors duration-300 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img src="{{ asset('img/formations/niveau2.png') }}"
                    alt="placeholder" class="w-fullmax-w-[250px] sm:max-w-[400px] h-auto object-cover rounded-lg mb-4">

                <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                    Formation à l'année - niveau 2
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400 mb-3 text-center text-sm sm:text-base">
                    Du 08/10/2024 au 10/06/2025, tous les mardis de 9h à 10h30
                </p>
                <p class="font-normal text-gray-700 dark:text-gray-400 mb-3 text-sm sm:text-base">Prix : 190 €</p>
                <div class="text-white bg-cyan-600 hover:bg-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 transition-colors duration-300">
                    Inscription
                </div>
            </a>

            <!-- Card 3 -->
            <a href="{{ route('niveau', ['slug' => $slug ,'nivel' => 'niveau3']) }}"
                class="flex flex-col items-center rounded-lg border border-gray-200 bg-pink-500 px-4 py-6 hover:bg-pink-400 transition-colors duration-300 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img src="{{ asset('img/formations/niveau3.png') }}"
                    alt="placeholder" class="w-full max-w-[250px] sm:max-w-[400px] h-auto object-cover rounded-lg mb-4">

                <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                    Formation à l'année - niveau 3
                </h5>
                <div class="font-normal text-gray-700 dark:text-gray-400 mb-3 text-center text-sm sm:text-base">
                    Du 08/10/2024 au 10/06/2025, tous les mardis de 11h à 12h30
                </div>
                <p class="font-normal text-gray-700 dark:text-gray-400 mb-3 text-sm sm:text-base">Prix : 190 €</p>
                <div class="text-white bg-cyan-600 hover:bg-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 transition-colors duration-300">
                    Inscription
                </div>
            </a>

            <!-- Card 4 -->
            <a href="{{ route('niveau', ['slug' => $slug ,'nivel' => 'niveau4']) }}"
                class="flex flex-col items-center rounded-lg border border-gray-200 bg-[#a8718a] px-4 py-6 hover:bg-[#a35578] transition-colors duration-300 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img src="{{ asset('img/formations/niveau4.png') }}"
                    alt="placeholder" class="w-fullmax-w-[250px] sm:max-w-[400px] h-auto object-cover rounded-lg mb-4">

                <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                    Formation à l'année - niveau 4
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400 mb-3 text-center text-sm sm:text-base">
                    Du 08/10/2024 au 10/06/2025, tous les mardis de 11h à 12h30
                </p>
                <p class="font-normal text-gray-700 dark:text-gray-400 mb-3 text-sm sm:text-base">Prix : 190 €</p>
                <div class="text-white bg-cyan-600 hover:bg-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 transition-colors duration-300">
                    Inscription
                </div>
            </a>
        </div>
    </div>
</x-layout>
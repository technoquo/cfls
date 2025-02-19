<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <section class="bg-white dark:bg-gray-900">
        <x-menuformation />
        <div class="mx-auto max-w-screen-2xl px-4 2xl:px-0">
            <h2 class="mb-4 text-7xl tracking-tight font-extrabold text-gray-900 dark:text-white text-center">Tables de
                conversation</h2>
            <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">

                <div class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl mb-4">Pour vous aider à
                    pratiquer
                    la langue des signes nous vous proposons, un vendredi par mois, de participer à nos tables de
                    conversation.</div>


            </div>

            <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                <a x-bind:href="false"
                    class="flex flex-col items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700   cursor-not-allowed opacity-50 pointer-events-non">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-20 dark:text-gray-400 text-gray-600 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">ven. 21 fevr 2025
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">14:00 – 16:00</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Prix : 8€/séance</p>
                    <div
                        class="text-white bg-red-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        fermé</div>
                </a>

                <a href="{{ route('inscription', ['id' => 1]) }}"
                    class="flex flex-col items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-20 dark:text-gray-400 text-gray-600 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">ven. 28 mars 2025
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">14:00 – 16:00</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Prix : 8€/séance</p>
                    <div
                        class="text-white bg-csfl hover:bg-cyan-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Inscription</div>
                </a>


                <a href="{{ route('inscription', ['id' => 1]) }}"
                    class="flex flex-col items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-20 dark:text-gray-400 text-gray-600 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">ven. 25 avr 2025
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">14:00 – 16:00</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Prix : 8€/séance</p>
                    <div
                        class="text-white bg-csfl hover:bg-cyan-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Inscription</div>
                </a>

                <a href="{{ route('inscription', ['id' => 1]) }}"
                    class="flex flex-col items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-20 dark:text-gray-400 text-gray-600 mb-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">ven. 27 juin 2025
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">14:00 – 16:00</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Prix : 8€/séance</p>
                    <div
                        class="text-white bg-csfl hover:bg-cyan-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Inscription</div>
                </a>
            </div>

            

        </div>
    </section>
</x-layout>

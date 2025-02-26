<x-layout>
    <x-slot name="title">Syllabus</x-slot>
    
    <!-- Include Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <div x-data="{ open: false }" class="flex flex-col lg:flex-row min-h-screen gap-4 px-4">
        <!-- Hamburger Button (Mobile Only) -->
        <button 
            x-on:click="open = !open" 
            type="button" 
            class="inline-flex items-center p-2 mt-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
         >
            <span class="sr-only">Open sidebar</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
            </svg>
        </button>

        <!-- Sidebar -->
        <aside 
            id="default-sidebar" 
            class="w-full md:w-[280px] h-auto transition-transform md:translate-x-0 fixed md:static top-0 left-0 z-40 shrink-0" 
            :class="{ 'translate-x-0': open, '-translate-x-full': !open }" 
            x-cloak
         >
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-400 dark:bg-gray-800 rounded-md">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('a-bientot') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="ms-3">01 - Je me présente</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('a-bientot') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">02 - Ma famille</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('a-bientot') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">03 - J'habite</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('a-bientot') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">04 - Je me déplace</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('a-bientot') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">05 - Quel jour sommes nous ?</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('a-bientot') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">06 - Ma routine</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('a-bientot') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">07 - Quel temps fait-il ?</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('a-bientot') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">08 - Chez le médecin</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('a-bientot') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">09 - Je découvre mes sentiments</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('a-bientot') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">10 - Au restaurant</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-4">
            <div class="flex justify-center">
                <h2 class="font-semibold text-gray-800 dark:text-gray-200 mb-5 md:text-7xl text-3xl">UE1 par thèmes</h2>
            </div>
            <div class="mt-2 md:text-3xl text-2xl dark:text-white text-center">01 - Je me présente</div>
            <div class="flex flex-col lg:flex-row justify-center gap-6 w-full">
                <!-- Scrollable List -->
                <div class="overflow-auto max-h-96 w-full lg:w-80 mt-10">
                    <ul class="max-w-md mx-auto space-y-4">
                        <li class="pb-3 sm:pb-4 hover:bg-gray-200 rounded-lg dark:hover:bg-gray-700 p-2">
                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                <div class="flex-1 min-w-0">
                                    <p class="text-base font-medium text-gray-900 truncate dark:text-white">
                                        A bientôt
                                    </p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 bg-csfl text-white rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                </svg>
                            </div>
                        </li>
                        <li class="pb-3 sm:pb-4 hover:bg-gray-200 rounded-lg dark:hover:bg-gray-700 p-2">
                            <div class="flex items-center space-x-4 rtl:space_x-reverse">
                                <div class="flex-1 min-w-0">
                                    <p class="text-base font-medium text-gray-900 truncate dark:text-white">
                                        Appeler (quelqu'un)
                                    </p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 bg-csfl text-white rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                </svg>
                            </div>
                        </li>
                        <li class="pb-3 sm:pb-4 hover:bg-gray-200 rounded-lg dark:hover:bg-gray-700 p-2">
                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                <div class="flex-1 min-w-0">
                                    <p class="text-base font-medium text-gray-900 truncate dark:text-white">
                                        Appeler (s')
                                    </p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 bg-csfl text-white rounded-full p-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                </svg>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Video Player -->
                <div class="w-full max-w-2xl p-4 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                    <iframe 
                        src='https://player.vimeo.com/video/990514387' 
                        class="w-full aspect-video" 
                        frameborder="0" 
                        allow="autoplay; fullscreen" 
                        allowfullscreen>
                    </iframe>
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center uppercase">
                        Titre
                    </h2>
                </div>
            </div>
        </div>
    </div>
</x-layout>
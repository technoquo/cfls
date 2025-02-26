<x-layout>
    <x-slot name="title">Syllabus</x-slot>
    <div x-data="{ open: false }">
        <!-- Hamburger Button (Mobile Only) -->
        <button x-on:click="open = !open" data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
            aria-controls="default-sidebar" type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
            </svg>


        </button>

        <aside id="default-sidebar"
            class="fixed top-60 left-0 z-40 w-[280px] h-auto transition-transform sm:translate-x-0 " aria-label="Sidebar"
            :class="{ 'translate-x-0': open, '-translate-x-full': !open }" x-cloak>
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-400 dark:bg-gray-800 rounded-md">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                            <span class="ms-3">01 - Je me présente</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                            <span class="flex-1 ms-3 whitespace-nowrap">02 - Ma famille</span>

                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                            <span class="flex-1 ms-3 whitespace-nowrap">03 - J'habite</span>

                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                            <span class="flex-1 ms-3 whitespace-nowrap">04 - Je me déplace</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                            <span class="flex-1 ms-3 whitespace-nowrap">05 - Quel jour sommes nous ?</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                            <span class="flex-1 ms-3 whitespace-nowrap">06 - Ma routine</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                            <span class="flex-1 ms-3 whitespace-nowrap">07 - Quel temps fait-il ?</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                            <span class="flex-1 ms-3 whitespace-nowrap">08 - Chez le médecin</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                            <span class="flex-1 ms-3 whitespace-nowrap">09 - Je découvre mes sentiments</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                            <span class="flex-1 ms-3 whitespace-nowrap">10 - Au restaurant</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
    <div class="p-4 sm:ml-64">
       <div class="flex justify-center">
        <h2 class="text-7xl font-semibold text-gray-800 dark:text-gray-200 mb-5">UE1 par thèmes</h2>
       
       </div>
       <div class="mt-2 text-3xl dark:text-white">01 - Je me présente</div>
        <div class="flex justify-center">
            <div class="overflow-auto max-h-96 w-80 mt-10"> <!-- Added max-h-96 for a max height of 24rem (384px) -->
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
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">                           
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
                 
                    <!-- Repeat your other <li> elements here -->
                    <!-- For brevity, I’ve kept only two items; add the rest as needed -->
                </ul>
            </div>

            <div class="w-full max-w-2xl p-4 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                
                <iframe src='https://player.vimeo.com/video/990514387' class="w-full aspect-video" frameborder="0"
                    allow="autoplay; fullscreen" allowfullscreen>
                </iframe>
                <h2
                    class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center uppercase">
                    Titre</h2>

            </div>
        </div>

    </div>

</x-layout>

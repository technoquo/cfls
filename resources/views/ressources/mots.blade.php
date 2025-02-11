<x-layout>
    <x-slot name="title">Mots croisés</x-slot>

    <h1 class="flex justify-center uppercase text-5xl font-bold dark:text-white">
        Mots croisés
    </h1>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8 mx-auto max-w-screen-2xl">
        <div x-data="{ active: 'mots' }"
            class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center">
                <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                    Saint Nicolas
                </div>
                <div class="ml-2 mt-2">
                    <a href="https://www.cfls.be/_files/ugd/beceb7_e4a17f43823b4ec7b7162d83dd702c99.pdf"
                        target="_blank"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                        </svg>
                    </a>
                </div>
            </div>
            <img x-show="active === 'mots'" class="rounded-t-lg"
                src="https://static.wixstatic.com/media/beceb7_8742c80452bc4a549c0f6aaaa39da34a~mv2.jpg/v1/fill/w_741,h_523,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/mots%20crois%C3%A9s%20capitales.jpg"
                alt="Mots Croisés" />

            <img x-show="active === 'solutions'" class="rounded-t-lg"
                src="https://static.wixstatic.com/media/beceb7_26d4d2accb3c4f739706a7f14f32c5c6~mv2.jpg/v1/crop/x_1,y_0,w_840,h_595/fill/w_739,h_523,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/solutions%20saint%20nicolas.jpg"
                alt="Solutions" />

            <div x-show="active === 'solutions-signees'">

                <div x-show="active === 'solutions-signees'" class="w-full h-[500px]">
                    <iframe class="w-full h-full rounded-lg" src="https://player.vimeo.com/video/827615267"
                        frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="flex justify-center items-center mt-3 mb-3 space-x-2">
                <button @click="active = 'mots'"
                    class="px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Mots Croisés
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
        <div x-data="{ active: 'mots' }"
            class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center">
                <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                    La Chandeleur
                </div>
                <div class="ml-2 mt-2">
                    <a href="https://www.cfls.be/_files/ugd/beceb7_e4a17f43823b4ec7b7162d83dd702c99.pdf"
                        target="_blank"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                        </svg>
                    </a>
                </div>
            </div>
            <img x-show="active === 'mots'" class="rounded-t-lg"
                src="https://static.wixstatic.com/media/beceb7_8742c80452bc4a549c0f6aaaa39da34a~mv2.jpg/v1/fill/w_741,h_523,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/mots%20crois%C3%A9s%20capitales.jpg"
                alt="Mots Croisés" />

            <img x-show="active === 'solutions'" class="rounded-t-lg"
                src="https://static.wixstatic.com/media/beceb7_26d4d2accb3c4f739706a7f14f32c5c6~mv2.jpg/v1/crop/x_1,y_0,w_840,h_595/fill/w_739,h_523,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/solutions%20saint%20nicolas.jpg"
                alt="Solutions" />

            <div x-show="active === 'solutions-signees'">

                <div x-show="active === 'solutions-signees'" class="w-full h-[500px]">
                    <iframe class="w-full h-full rounded-lg" src="https://player.vimeo.com/video/827615267"
                        frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="flex justify-center items-center mt-3 mb-3 space-x-2">
                <button @click="active = 'mots'"
                    class="px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Mots Croisés
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
        <div x-data="{ active: 'mots' }"
            class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center">
                <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                     Saint Valetin
                </div>
                <div class="ml-2 mt-2">
                    <a href="https://www.cfls.be/_files/ugd/beceb7_e4a17f43823b4ec7b7162d83dd702c99.pdf"
                        target="_blank"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                        </svg>
                    </a>
                </div>
            </div>
            <img x-show="active === 'mots'" class="rounded-t-lg"
                src="https://static.wixstatic.com/media/beceb7_8742c80452bc4a549c0f6aaaa39da34a~mv2.jpg/v1/fill/w_741,h_523,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/mots%20crois%C3%A9s%20capitales.jpg"
                alt="Mots Croisés" />

            <img x-show="active === 'solutions'" class="rounded-t-lg"
                src="https://static.wixstatic.com/media/beceb7_26d4d2accb3c4f739706a7f14f32c5c6~mv2.jpg/v1/crop/x_1,y_0,w_840,h_595/fill/w_739,h_523,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/solutions%20saint%20nicolas.jpg"
                alt="Solutions" />

            <div x-show="active === 'solutions-signees'">

                <div x-show="active === 'solutions-signees'" class="w-full h-[500px]">
                    <iframe class="w-full h-full rounded-lg" src="https://player.vimeo.com/video/827615267"
                        frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="flex justify-center items-center mt-3 mb-3 space-x-2">
                <button @click="active = 'mots'"
                    class="px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Mots Croisés
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
        <div x-data="{ active: 'mots' }"
        class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-center">
            <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                Carnaval
            </div>
            <div class="ml-2 mt-2">
                <a href="https://www.cfls.be/_files/ugd/beceb7_e4a17f43823b4ec7b7162d83dd702c99.pdf"
                    target="_blank"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                    </svg>
                </a>
            </div>
        </div>
        <img x-show="active === 'mots'" class="rounded-t-lg"
            src="https://static.wixstatic.com/media/beceb7_8742c80452bc4a549c0f6aaaa39da34a~mv2.jpg/v1/fill/w_741,h_523,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/mots%20crois%C3%A9s%20capitales.jpg"
            alt="Mots Croisés" />

        <img x-show="active === 'solutions'" class="rounded-t-lg"
            src="https://static.wixstatic.com/media/beceb7_26d4d2accb3c4f739706a7f14f32c5c6~mv2.jpg/v1/crop/x_1,y_0,w_840,h_595/fill/w_739,h_523,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/solutions%20saint%20nicolas.jpg"
            alt="Solutions" />

        <div x-show="active === 'solutions-signees'">

            <div x-show="active === 'solutions-signees'" class="w-full h-[500px]">
                <iframe class="w-full h-full rounded-lg" src="https://player.vimeo.com/video/827615267"
                    frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
        </div>
        <div class="flex justify-center items-center mt-3 mb-3 space-x-2">
            <button @click="active = 'mots'"
                class="px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Mots Croisés
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
    </section>
</x-layout>

<section class=" bg-white dark:bg-gray-900 mb-4">
    <div class="max-w-screen-2xl px-4 py-8 mx-auto space-y-12">
         <h2 class="mb-4 text-7xl font-extrabold tracking-tight text-gray-900 dark:text-white uppercase">Le CFLS, c'est:</h2>
        <!-- Row -->
        <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
            <div>

                <iframe src="https://player.vimeo.com/video/1047122935" class="w-full aspect-video" frameborder="0"
                    allow="autoplay; fullscreen" allowfullscreen>
                </iframe>
            </div>
            <div class="text-gray-700 sm:text-lg dark:text-gray-400 block">

              


                <div x-data="{ active: 1 }" class="mx-auto min-h-[16rem] w-full max-w-3xl">
                    <div x-data="{
                        id: 1,
                        get expanded() {
                            return this.active === this.id
                        },
                        set expanded(value) {
                            this.active = value ? this.id : null
                        },
                    }" role="region"
                        class="block border-b border-gray-800/10 pb-4 pt-4 first:pt-0 last:border-b-0 last:pb-0">
                        <h2>
                            <button type="button" x-on:click="expanded = !expanded" :aria-expanded="expanded"
                                class="group flex w-full items-center justify-between text-left  text-gray-800 dark:text-csfl font-bold text-2xl">
                                <span class="flex-1">Formations</span>

                                <!-- Heroicons mini chevron-up -->
                                <svg x-show="expanded" x-cloak
                                    class="size-5 shrink-0 text-gray-300 group-hover:text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z"
                                        clip-rule="evenodd"></path>
                                </svg>

                                <!-- Heroicons mini chevron-down -->
                                <svg x-show="!expanded" class="size-5 shrink-0 text-gray-300 group-hover:text-gray-800"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>

                        <div x-show="expanded" x-collapse>
                            <div class="pt-2 text-gray-600 dark:text-white max-w-xl text-2xl">Formations accélérées durant les vacances
                                scolaires, ou formations hebdomadaires durant toute l'année. Nous proposons aussi des
                                cours privés. </div>
                        </div>
                    </div>

                    <div x-data="{
                        id: 2,
                        get expanded() {
                            return this.active === this.id
                        },
                        set expanded(value) {
                            this.active = value ? this.id : null
                        },
                    }" role="region"
                        class="block border-b border-gray-800/10 pb-4 pt-4 first:pt-0 last:border-b-0 last:pb-0">
                        <h2>
                            <button type="button" x-on:click="expanded = !expanded" :aria-expanded="expanded"
                            class="group flex w-full items-center justify-between text-left  text-gray-800 dark:text-csfl font-bold text-2xl">
                                <span class="flex-1">Sensibilisations</span>

                                <!-- Heroicons mini chevron-up -->
                                <svg x-show="expanded" x-cloak
                                    class="size-5 shrink-0 text-gray-300 group-hover:text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z"
                                        clip-rule="evenodd"></path>
                                </svg>

                                <!-- Heroicons mini chevron-down -->
                                <svg x-show="!expanded" class="size-5 shrink-0 text-gray-300 group-hover:text-gray-800"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>

                        <div x-show="expanded" x-collapse>
                            <div class="pt-2 text-gray-600 dark:text-white max-w-xl text-2xl">Ces ateliers de découverte de la culture sourde permettent de mieux appréhender la surdité.
                                Ils comprennent également une initiation à la langue des signes.</div>
                        </div>
                    </div>


                    <div x-data="{
                        id: 3,
                        get expanded() {
                            return this.active === this.id
                        },
                        set expanded(value) {
                            this.active = value ? this.id : null
                        },
                    }" role="region"
                        class="block border-b border-gray-800/10 pb-4 pt-4 first:pt-0 last:border-b-0 last:pb-0">
                        <h2>
                            <button type="button" x-on:click="expanded = !expanded" :aria-expanded="expanded"
                            class="group flex w-full items-center justify-between text-left  text-gray-800 dark:text-csfl font-bold text-2xl">
                                <span class="flex-1">Publications</span>

                                <!-- Heroicons mini chevron-up -->
                                <svg x-show="expanded" x-cloak
                                    class="size-5 shrink-0 text-gray-300 group-hover:text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z"
                                        clip-rule="evenodd"></path>
                                </svg>

                                <!-- Heroicons mini chevron-down -->
                                <svg x-show="!expanded" class="size-5 shrink-0 text-gray-300 group-hover:text-gray-800"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>

                        <div x-show="expanded" x-collapse>
                            <div class="pt-2 text-gray-600 dark:text-white max-w-xl text-2xl">Des publications d’apprentissage de la langue des
                                signes destinées aux élèves des cours de promotion sociale, ainsi que de nombreuses
                                publications sur des thèmes variés et spécifiques.</div>
                        </div>
                    </div>


                </div>






            </div>

        </div>

    </div>
</section>

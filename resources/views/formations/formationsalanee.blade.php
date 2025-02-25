<x-layout>
    <x-slot name="title">{{ $slug }}</x-slot>
    <section class="bg-white dark:bg-gray-900">
        <x-menuformation :slug="$slug" />
        <div
            class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-7xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <img class="w-full" src="{{ asset('img/formations/DSC01820.png') }}" alt="">

            <div class="mt-4 md:mt-0">
                <h2 class="mb-4 text-7xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $slug }}</h2>
                <p class="mb-6 font-light text-gray-500 text-lg dark:text-gray-400 md:text-2xl">
                    Une autre de nos formules d'apprentissage est la formation à l'année. A la différence de la formation accélérée, elle se dispense toutes les semaines durant 1h30.
                    </br>
                    Elle laisse ainsi plus de place à la communication et aux exercices pratiques, tout en suivant le même programme que pour les formations accélérées.
                </p>
                <a href="{{ route('courses', ['slug' => 'formationsalanee']) }}"
                    class="inline-flex items-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-2xl px-5 py-2.5 text-center dark:focus:ring-primary-900  bg-blue-700 hover:bg-blue-800">
                     Programme de Cours 2024-2025
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="w-full  md:h-[280px] dark:bg-slate-900">
            <!-- Tabs -->
            <div x-data="{
                selectedId: null,
                init() {
                    this.$nextTick(() => this.select(this.$id('tab', 1)))
                },
                select(id) {
                    this.selectedId = id
                },
                isSelected(id) {
                    return this.selectedId === id
                },
                whichChild(el, parent) {
                    return Array.from(parent.children).indexOf(el) + 1
                }
            }" x-id="['tab']" class="w-full mx-auto max-w-screen-2xl">

                <!-- Tab List -->
                <ul x-ref="tablist" @keydown.right.prevent.stop="$focus.wrap().next()"
                    @keydown.home.prevent.stop="$focus.first()" @keydown.page-up.prevent.stop="$focus.first()"
                    @keydown.left.prevent.stop="$focus.wrap().prev()" @keydown.end.prevent.stop="$focus.last()"
                    @keydown.page-down.prevent.stop="$focus.last()" role="tablist"
                    class="-mb-px flex w-full items-stretch overflow-x-auto  gap-2 md:mb-2">

                    <!-- Tab -->
                    <li class="w-full text-center">
                        <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))" @click="select($el.id)"
                            @mousedown.prevent @focus="select($el.id)" type="button"
                            :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
                            :class="isSelected($el.id) ? 'bg-gray-200 dark:bg-gray-600' : 'border-transparent dark:bg-slate-800'"
                            class="w-full inline-flex justify-center px-4 py-2 text-sm whitespace-nowrap border border-gray-500/50 rounded hover:bg-gray-300 dark:bg-gray-100 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 md:text-2xl"
                            role="tab">Niveau 1 (débutant)</button>
                    </li>

                    <li class="w-full text-center">
                        <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))" @click="select($el.id)"
                            @mousedown.prevent @focus="select($el.id)" type="button"
                            :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
                            :class="isSelected($el.id) ? 'bg-gray-200 dark:bg-gray-600' : 'border-transparent dark:bg-slate-800'"
                            class="w-full inline-flex justify-center px-4 py-2 text-sm whitespace-nowrap border border-gray-500/50 rounded hover:bg-gray-300 dark:bg-gray-100 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 md:text-2xl"
                            role="tab">Niveau 2 (connaissances de base)</button>
                    </li>

                    <li class="w-full text-center">
                        <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))" @click="select($el.id)"
                            @mousedown.prevent @focus="select($el.id)" type="button"
                            :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
                            :class="isSelected($el.id) ? 'bg-gray-200 dark:bg-gray-600' : 'border-transparent dark:bg-slate-800'"
                            class="w-full inline-flex justify-center px-4 py-2 text-sm whitespace-nowrap border border-gray-500/50 rounded hover:bg-gray-300 dark:bg-gray-100 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 md:text-2xl"
                            role="tab">Niveau 3 et 4</button>
                    </li>
                 
                </ul>

                <!-- Panels -->
                <div role="tabpanels"
                    class="w-full border   text-2xl  dark:bg-slate-900 bg-white rounded-b-lg rounded-tr-lg  dark:text-slate-100">
                    <!-- Panel -->
                    <section x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                        :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))" role="tabpanel"
                        class="p-8">

                        <p class="mt-2">L'objectif de ce premier niveau est d'abord de découvrir la surdité et la langue des signes. Il est ensuite d'apprendre les bases de la communication avec les personnes sourdes.</p>
                      

                    </section>

                    <section x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                        :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))" role="tabpanel"
                        class="p-8">
                        <p class="mt-2"> Inscrivez-vous aux 2 niveaux consécutifs, et bénéficiez d'une
                            réduction de 25€ sur le niveau 2 !</p>
                       

                    </section>

                    <section x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                        :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))" role="tabpanel"
                        class="p-8">
                        <p class="mt-2">Ce troisième et ce quatrième niveau permettent d'enrichir et complexifier les échanges en langue des signes.
                        </p>
                    </section>

                  
              

                  

                </div>
            </div>
        </div>
        
    </section>
</x-layout>

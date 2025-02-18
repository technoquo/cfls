<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <section class="bg-white dark:bg-gray-900">
        <x-menuformation />
        <div
            class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-7xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <img class="w-full" src="{{ asset('img/formations/DSC01820.png') }}" alt="">

            <div class="mt-4 md:mt-0">
                <h2 class="mb-4 text-7xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $title }}</h2>
                <p class="mb-6 font-light text-gray-500 text-lg dark:text-gray-400 md:text-2xl">
                    Nos formations sont une ouverture sur une culture et sur une langue riche et complexe possédant sa
                    propre grammaire et ses subtilités.
                    </br>
                    Au-delà du vocabulaire, l'apprentissage de l'iconicité, des transferts de situation et de personne,
                    les expressions pi-sourd, la grammaire, les classificateurs,.. vous immergent directement dans la
                    richesse et la complexité de la langue des signes.
                </p>
                <a href="#"
                    class="inline-flex items-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-2xl px-5 py-2.5 text-center dark:focus:ring-primary-900  bg-blue-700 hover:bg-blue-800">
                    Calendrier 2024 - 2025
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="w-full md:h-[280px] dark:bg-slate-900">
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
                            role="tab">Conditions d'accès</button>
                    </li>

                    <li class="w-full text-center">
                        <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))" @click="select($el.id)"
                            @mousedown.prevent @focus="select($el.id)" type="button"
                            :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
                            :class="isSelected($el.id) ? 'bg-gray-200 dark:bg-gray-600' : 'border-transparent dark:bg-slate-800'"
                            class="w-full inline-flex justify-center px-4 py-2 text-sm whitespace-nowrap border border-gray-500/50 rounded hover:bg-gray-300 dark:bg-gray-100 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 md:text-2xl"
                            role="tab">Où</button>
                    </li>

                    <li class="w-full text-center">
                        <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))" @click="select($el.id)"
                            @mousedown.prevent @focus="select($el.id)" type="button"
                            :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
                            :class="isSelected($el.id) ? 'bg-gray-200 dark:bg-gray-600' : 'border-transparent dark:bg-slate-800'"
                            class="w-full inline-flex justify-center px-4 py-2 text-sm whitespace-nowrap border border-gray-500/50 rounded hover:bg-gray-300 dark:bg-gray-100 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 md:text-2xl"
                            role="tab">Prix</button>
                    </li>
                    <li class="w-full text-center">
                        <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))" @click="select($el.id)"
                            @mousedown.prevent @focus="select($el.id)" type="button"
                            :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
                            :class="isSelected($el.id) ? 'bg-gray-200 dark:bg-gray-600' : 'border-transparent dark:bg-slate-800'"
                            class="w-full inline-flex justify-center px-4 py-2 text-sm whitespace-nowrap border border-gray-500/50 rounded hover:bg-gray-300 dark:bg-gray-100 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 md:text-2xl"
                            role="tab">Promotion</button>
                    </li>
                    <li class="w-full text-center">
                        <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))" @click="select($el.id)"
                            @mousedown.prevent @focus="select($el.id)" type="button"
                            :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
                            :class="isSelected($el.id) ? 'bg-gray-200 dark:bg-gray-600' : 'border-transparent dark:bg-slate-800'"
                            class="w-full inline-flex justify-center px-4 py-2 text-sm whitespace-nowrap border border-gray-500/50 rounded hover:bg-gray-300 dark:bg-gray-100 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 md:text-2xl"
                            role="tab">Modalités de paiement</button>
                    </li>
                    <li class="w-full text-center">
                        <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))" @click="select($el.id)"
                            @mousedown.prevent @focus="select($el.id)" type="button"
                            :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
                            :class="isSelected($el.id) ? 'bg-gray-200 dark:bg-gray-600' : 'border-transparent dark:bg-slate-800'"
                            class="w-full inline-flex justify-center px-4 py-2 text-sm whitespace-nowrap border border-gray-500/50 rounded hover:bg-gray-300 dark:bg-gray-100 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500  md:text-2xl"
                            role="tab">Participants</button>
                    </li>
                </ul>

                <!-- Panels -->
                <div role="tabpanels"
                    class="w-full border text-2xl   dark:bg-slate-900 bg-white rounded-b-lg rounded-tr-lg  dark:text-slate-100">
                    <!-- Panel -->
                    <section x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                        :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))" role="tabpanel"
                        class="p-8">

                        <p class="mt-2">Niveau 1 : aucune condition</p>
                        <p class="mt-2">Niveau 2 : test d’évaluation si vous n'avez pas effectué votre
                            formation - niveau 1 avec nos formatrices</p>
                        <p class="mt-2">Age minimum requis : 16 ans</p>
                        <p class="mt-2">L'achat du manuel de cours (UE 1 ou UE 2) est
                            <strong>obligatoire.</strong> Il est au prix de <strong>30€</strong> pour UE 1 et
                            <strong>14€</strong> pour UE 2.
                        </p>

                    </section>

                    <section x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                        :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))" role="tabpanel"
                        class="p-8">
                        <p class="mt-2">Dans nos locaux, <span class="font-semibold">avenue du four à briques, 3A -
                                1140
                                Evere</span></p>

                    </section>

                    <section x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                        :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))" role="tabpanel"
                        class="p-8">
                        <h2 class="text-xl">Prix: 175€</h2>
                        <p class="mt-2"><span class="font-semibold">150€</span> pour les personnes au chômage, les
                            étudiant·es ou les bénéficiaires des indemnités de mutuelle (sur présentation de
                            l'attestation correspondante)</p>
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
                        <p class="mt-2">
                        <ul>
                            <li> 1) Après avoir rempli le formulaire de réservation, vous recevrez une confirmation par
                                mail</li>
                            <li> 2) Effectuez au plus tôt le virement d'un acompte de 30€ sur notre compte :
                                <span class="font-semibold">BE38 3100 5385 3072 </span> afin de valider complètement
                                votre inscription
                                (attention : sans le paiement d'un acompte, votre réservation ne sera pas garantie)
                            </li>
                        </ul>
                        </p>

                    </section>

                    <section x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                        :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))" role="tabpanel"
                        class="p-8">

                        <p class="mt-2">Le nombre maximum de participants est limité à <strong>10</strong>
                            , afin de pouvoir vous accueillir dans les meilleures conditions. </p>
                        <p class="mt-2">A l’inverse, le nombre minimum de participants est de
                            <strong>4</strong> , , afin de pouvoir permettre les échanges et la communication entre les
                            élèves.
                        </p>

                    </section>


                </div>
            </div>
        </div>
       
    </section>
</x-layout>

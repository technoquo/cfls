<x-layout :logo="$image">
    <x-slot name="title">Inscriptions</x-slot>
    <section class="bg-white dark:bg-gray-900">
        <x-menuformation :slug="'tableconversation'" />
        <div class="grid max-w-screen-2xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Table de conversation</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Afin
                    de poursuivre votre apprentissage, participez à notre atelier "table de conversation", mêlant jeux,
                    communication et discussions sur différents thèmes !</p>
              
                <p class="max-w-2xl mb-2  text-black font-semibold lg:mb-4 md:text-lg lg:text-xl dark:text-gray-400">
                    Heure et Lieu</p>
                <p class="max-w-2xl  text-black font-semibold  md:text-lg lg:text-xl dark:text-gray-400 ">
                <div>
                    21 févr. 2025, 14:00 – 16:00
                </div>
                <div>
                    Av. du Four à Briques 3A, 1140 Bruxelles, Belgique
                </div>
                <div>
                    8€/séance
                </div>
                </p>

                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center bg-csfl text-white  border border-gray-300 rounded-lg hover:bg-cyan-400 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800 mt-5">
                    Inscription
                </a>
                <div>
                    <form class="mt-8">
                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sélectionner une autre
                            date</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choisissez une date</option>
                            <option>21 vend, fevr. 2025, 14:00 – 16:00</option>
                            <option>28 vend, mars. 2025, 14:00 – 16:00</option>
                            <option>25 vend, avr. 2025, 14:00 – 16:00</option>
                            <option>23 vend, mai. 2025, 14:00 – 16:00</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('img/formations/Affiche_table_conversation_2025.png') }}" alt="mockup">
            </div>
        </div>
    </section>
</x-layout>

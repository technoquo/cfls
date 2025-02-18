<x-layout>
    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    @endpush
    <x-slot name="title">{{ $title }}</x-slot>
    <section class=" bg-white dark:bg-gray-900 mb-4">
        <x-menuformation />
        <h2 class="mb-4 text-7xl uppercase tracking-tight font-extrabold text-gray-900 dark:text-white text-center mt-9">Cours privés</h2>
        <div class="max-w-screen-2xl px-4 py-8 mx-auto space-y-12">
          
            <!-- Row -->
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16 wow animate__animated animate__backInLeft">
                <div class="text-gray-700 sm:text-lg dark:text-gray-400">

                    <p class="mb-8 font-medium lg:text-2xl">
                        Nous avons été sollicités par la commune d'Evere pour former certains membres du personnel.
                        Cette formation en langue des signes pour débutants avait pour but de faciliter le premier
                        contact avec la personne sourde. Nous félicitons la commune d'Evere pour sa volonté d'inclusion!
                    </p>
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('img/1coursprive.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="max-w-screen-2xl px-4 py-8 mx-auto space-y-12">
            <!-- Row -->
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16 wow animate__animated animate__backInRight">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('img/2courseprive.png') }}" alt="">
                </div>
                <div class="text-gray-700 sm:text-lg dark:text-gray-400">

                    <p class="mb-8 font-medium lg:text-2xl">
                        Le cabinet de la Ministre des Pensions et de l'Intégration sociale, chargée des Personnes
                        handicapées Karine Lalieux nous a sollicité pour initier à la langue des signes la ministre
                        ainsi qu'une partie de son équipe.
                        </br>
                        Dans le cadre de ses compétences, elle a souhaité sensibiliser ses équipes afin d'aller à la
                        rencontre de la personne sourde de manière plus aisée.
                    </p>
                </div>
            </div>
        </div>
        <div class="max-w-screen-2xl px-4 py-8 mx-auto space-y-12">

            <!-- Row -->
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16 wow animate__animated animate__backInUp">
                <div class="text-gray-700 sm:text-lg dark:text-gray-400">

                    <p class="mb-8 font-medium lg:text-2xl">
                        La Bastide propose un hébergement thérapeutique à des personnes sourdes rencontrant des
                        difficultés socio-professionnelles ou psychologiques auxquelles s’ajoutent éventuellement
                        d’autres handicaps ou problèmes de santé. Ils nous contactés pour leur proposer une formation
                        accélérée d'une semaine à destination de tout leur personnel, afin de faciliter les échanges
                        avec les personnes sourdes, et ainsi de mieux comprendre leur culture.
                    </p>
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('img/3courseprive.png') }}" alt="">
                </div>
            </div>
        </div>
        
        <div class="flex justify-center items-center py-8">
           
            <a href="mailto:info@cfls.be"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg  px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 text-2xl">Nous
                contacter</a>
        </div>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Ils ont fait appel
                    à nous :</h2>

            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                <!-- Pricing Card -->
                <div
                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('img/LOGO_bruxelles_francophones_600x300.png') }}" alt="">
                </div>
                <!-- Pricing Card -->
                <div
                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('img/LOGO_Liege_Universite_600x300.png') }}" alt="">
                </div>
                <!-- Pricing Card -->
                <div
                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <img src="{{ asset('img/LOGO_Evere_600x300.png') }}" alt="">
                        
                </div>
            </div>
        </div>

    </section>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        <script>
            new WOW({
                boxClass: 'wow', // Clase que activa la animación
                animateClass: 'animate__animated', // Clase de animación de Animate.css
                offset: 100, // Distancia desde la parte inferior de la pantalla para activar la animación
                mobile: true, // Activar en dispositivos móviles
                live: true // Detectar cambios en el DOM y animar elementos añadidos dinámicamente
            }).init();
        </script>
    @endpush
</x-layout>

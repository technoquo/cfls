<x-layout>
    @push('css')
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    @endpush
    <x-slot name="title">Formations</x-slot>
 <section>
    <div class="wow animate__animated animate__fadeInUp bg-white dark:bg-gray-900 gap-8 items-center py-8 px-4  xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6 mb-4">
        <img class="w-full rounded-lg" src="{{ asset('img/formations/DSC01820.png') }}" alt="dashboard image">       
        <div class="mt-4 md:mt-0">
            <h2 class="mb-4 text-7xl uppercase tracking-tight font-extrabold text-gray-900 dark:text-white">Formations accélérées</h2>
            <p class="mb-6 font-light text-gray-500 md:text-2xl dark:text-gray-400">Nos formations sont une ouverture sur une culture et sur une langue riche et complexe possédant sa propre grammaire et ses subtilités. </p>
            <p class="mb-6 font-light text-gray-500 md:text-2xl dark:text-gray-400">Au-delà du vocabulaire, l'apprentissage de l'iconicité, des transferts de situation et de personne, les expressions pi-sourd, la grammaire, les classificateurs,.. vous immergent directement dans la richesse et la complexité de la langue des signes.</p>
            <a href="{{ route('formations.slug', ['slug' => 'formationsaccelerees']) }}" wire:navigate class="inline-flex items-center text-gray-900 dark:text-csfl bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-2xl px-5 py-2.5 text-center dark:focus:ring-primary-900">
                Voir plus d'informations
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
    </div>
    <div class="wow animate__animated animate__fadeInUp bg-white dark:bg-gray-900 gap-8 items-center py-8 px-4  xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6 mb-4">       
        <div class="mt-4 md:mt-0">
            <h2 class="mb-4 text-7xl uppercase tracking-tight font-extrabold text-gray-900 dark:text-white">Formations à l'année</h2>
            <p class="mb-6 font-light text-gray-500 md:text-2xl dark:text-gray-400">Une autre de nos formules d'apprentissage est la formation à l'année. A la différence de la formation accélérée, elle se dispense toutes les semaines durant 1h30.</p>
            <p class="mb-6 font-light text-gray-500 md:text-2xl dark:text-gray-400">Elle laisse ainsi plus de place à la communication et aux exercices pratiques, tout en suivant le même programme que pour les formations accélérées.</p>
            <a href="{{  route('formations.slug', ['slug' => 'formationsalanee']) }}" wire:navigate class="inline-flex items-center text-gray-900 dark:text-csfl bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-2xl px-5 py-2.5 text-center dark:focus:ring-primary-900">
                Voir plus d'informations
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
        <img class="w-full rounded-lg" src="{{ asset('img/formations/IMG_0526.png') }}" alt="dashboard image">     
    </div>
    <div class="wow animate__animated animate__fadeInUp bg-white dark:bg-gray-900 gap-8 items-center py-8 px-4  xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6 mb-4">
        <img class="w-full rounded-lg" src="{{ asset('img/formations/CFLS_EIM-3.png') }}" alt="dashboard image">       
        <div class="mt-4 md:mt-0">
            <h2 class="mb-4 text-7xl uppercase tracking-tight font-extrabold text-gray-900 dark:text-white">Sensibilisations</h2>
            <p class="mb-6 font-light text-gray-500 md:text-2xl dark:text-gray-400">Depuis de nombreuses années, nous proposons des sensibilisations aux personnes désireuses de découvrir le monde de la surdité. Celles-ci se construisent autour d’outils pédagogiques créés par le CFLS (affiches, brochures, vidéos, jeux de signes de type mots-croisés) et sont agrémentées de jeux, de petits exercices et de mises en situation dynamiques, pratiques et participatives afin de mieux comprendre les difficultés rencontrées par les personnes sourdes au quotidien.</p>
            <p class="mb-6 font-light text-gray-500 md:text-2xl dark:text-gray-400">Lors de ces actions, nous abordons différents aspects de la surdité (les différents types, les différentes aides techniques …), mais nous évoquons surtout les moyens de communication à privilégier avec les personnes sourds ou malentendantes et les bons comportements à adopter.</p>
            <p class="mb-6 font-light text-gray-500 md:text-2xl dark:text-gray-400">Nos sensibilisations sont un service que nous offrons à tout organisme, école, association ou groupes qui en formuleraient la demande.</p>
            <a href="{{  route('formations.slug', ['slug' => 'sensibilisations']) }}" wire:navigate class="inline-flex items-center text-gray-900 dark:text-csfl bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-2xl px-5 py-2.5 text-center dark:focus:ring-primary-900">
                Voir plus d'informations
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
    </div>
    <div class="wow animate__animated animate__fadeInUp bg-white dark:bg-gray-900 gap-8 items-center py-8 px-4  xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6 mb-4">         
        <div class="mt-4 md:mt-0">
            <h2 class="mb-4 text-7xl uppercase tracking-tight font-extrabold text-gray-900 dark:text-white">Cours privés</h2>
            <p class="mb-6 font-light text-gray-500 md:text-2xl dark:text-gray-400">
                <span class="font-bold text-black dark:text-white">Durée:</span> à déterminer ensemble
            .</p>
            <p class="mb-6 font-light text-gray-500 md:text-2xl dark:text-gray-400">
                <span class="font-bold text-black dark:text-white">Participants:</span> de 1 à 15 personnese
            .</p>
            <p class="mb-6 font-light text-gray-500 md:text-2xl dark:text-gray-400">
                <span class="font-bold text-black dark:text-white">Lieu:</span> dans nos locaux ou sur votre lieu de travail</span> 
            .</p>
            <a href="{{  route('formations.slug', ['slug' => 'coursprives']) }}" wire:navigate class="inline-flex items-center text-gray-900 dark:text-csfl bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-2xl px-5 py-2.5 text-center dark:focus:ring-primary-900">
                Voir plus d'informations
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
        <img class="w-full rounded-lg" src="{{ asset('img/formations/IMG-20230201-WA0011.png') }}" alt="dashboard image">     
    </div>
    <div class="wow animate__animated animate__fadeInUp bg-white dark:bg-gray-900 gap-8 items-center py-8 px-4  xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6 mb-4">
        <img class="w-full rounded-lg" src="{{ asset('img/formations/Affiche_table_conversation_2025.png') }}" alt="dashboard image">       
        <div class="mt-4 md:mt-0">
            <h2 class="mb-4 text-7xl uppercase tracking-tight font-extrabold text-gray-900 dark:text-white">Tables de conversation</h2>
            <p class="mb-6 font-light text-gray-500 md:text-2xl dark:text-gray-400">Pour vous aider à pratiquer la langue des signes nous vous proposons, un vendredi par mois, de participer à nos tables de conversation.</p>

            <a href="{{  route('formations.slug', ['slug' => 'tableconversation']) }}" wire:navigate class="inline-flex items-center text-gray-900 dark:text-csfl bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-2xl px-5 py-2.5 text-center dark:focus:ring-primary-900">
                Voir plus d'informations
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
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
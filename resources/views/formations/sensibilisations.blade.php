<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <section class="bg-white dark:bg-gray-900">
        <x-menuformation />
        <div
            class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-7xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <img class="w-full" src="{{ asset('img/formations/DSC01820.png') }}" alt="">

            <div class="mt-4 md:mt-0">
                <h2 class="mb-4 text-7xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $title }}</h2>
                <div class="mb-6 font-light text-gray-500 text-lg dark:text-gray-400 md:text-2xl">
                   <p>Depuis de nombreuses années, nous proposons des sensibilisations aux personnes désireuses de découvrir le monde de la surdité. Celles-ci se construisent autour d’outils pédagogiques créés par le CFLS (affiches, brochures, vidéos, jeux de signes de type mots-croisés) et sont agrémentées de jeux, de petits exercices et de mises en situation dynamiques, pratiques et participatives afin de mieux comprendre les difficultés rencontrées par les personnes sourdes au quotidien.</p>
                    <p>
                    Lors de ces actions, nous abordons différents aspects de la surdité (les différents types, les différentes aides techniques …), mais nous évoquons surtout les moyens de communication à privilégier avec les personnes sourds ou malentendantes et les bons comportements à adopter.
                    </p>
                    <p>
                    Nos sensibilisations sont un service que nous offrons à tout organisme, école, association ou groupes qui en formuleraient la demande.
                    </p>
                </div>
              
            </div>
        </div>
      
    </section>
</x-layout>
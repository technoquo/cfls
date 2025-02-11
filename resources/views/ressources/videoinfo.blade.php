@php
$titles = [
    ['title' => '21 JUILLET : ORIGINES DE LA FÊTE NATIONALE', 'videoId' => '827615267'],
    ['title' => 'LES ABEILLES EN DANGER', 'videoId' => '827615267'],
    ['title' => '8 MARS : JOURNEE DE LA FEMME', 'videoId' => '827615267'],
    ['title' => 'CHANDELEUR', 'videoId' => '827615267'],
    ['title' => 'ARMISTICE DE LA 1ERE GUERRE MONDIALE" - ', 'videoId' => '827615267'],
    ['title' => 'OCTOBRE ROSE', 'videoId' => '827615267'],
    ['title' => 'FÊTE DE LA COMMUNAUTE FRANCAISE', 'videoId' => '827615267'],
    ['title' => 'JOURNÉE MONDIALE DES LANGUES DES SIGNES', 'videoId' => '827615267'],
    ['title' => 'LE NOUVEAU CALENDRIER SCOLAIRE', 'videoId' => '827615267'],
    ['title' => "JOURNÉE MONDIALE CONTRE L'ABANDON DES ANIMAUX", 'videoId' => '827615267'],
    ['title' => 'FÊTE DES PÈRES : ORIGINES', 'videoId' => '827615267'],
    ['title' => 'FÊTE DES MÈRES : ORIGINES', 'videoId' => '827615267'],
    ['title' => 'CARNAVAL : ORIGINES', 'videoId' => '827615267'],
    ['title' => 'SADAKO SASAKI - UN SYMBOLE DE PAIX', 'videoId' => '827615267'],
    ['title' => "LES PREMIERS PAS DE L'HOMME SUR LA LUNE", 'videoId' => '827615267'],
];
@endphp
<x-layout>
    <x-slot name="title">Poésie et contes signés</x-slot>

    <h1 class="flex justify-center uppercase text-5xl font-bold dark:text-white">
        Poésie et contes signés
    </h1>

    <section class="flex justify-evenly flex-wrap gap-4 mt-8">
        @foreach ($titles as $video)
            <x-vimeo-thumbnail :title="$video['title']" :vimeoId="$video['videoId']" />
        @endforeach
    </section>
</x-layout>

@php
$titles = [
    ['title' => '21 JUILLET : ORIGINES DE LA FÊTE NATIONALE', 'videoId' => '827615267', 'img' => asset('img/fete.jpg')],
    ['title' => 'FÊTE DE LA MUSIQUE', 'videoId' => '827615267', 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg'],
    ['title' => 'FÊTE DES PÈRES : ORIGINES', 'videoId' => '827615267', 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg'],
    ['title' => 'LES ABEILLES EN DANGER', 'videoId' => '827615267','img' => 'https://flowbite.com/docs/images/blog/image-1.jpg'],
    ['title' => '8 MARS : JOURNEE DE LA FEMME', 'videoId' => '827615267', 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg'],
    ['title' => 'CHANDELEUR', 'videoId' => '827615267' , 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg'],
    ['title' => 'ARMISTICE DE LA 1ERE GUERRE MONDIALE" ', 'videoId' => '827615267', 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg'],
    ['title' => 'OCTOBRE ROSE', 'videoId' => '827615267', 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg'],
    ['title' => 'FÊTE DE LA COMMUNAUTE FRANCAISE', 'videoId' => '827615267', 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg'],
    ['title' => 'JOURNÉE MONDIALE DES LANGUES DES SIGNES', 'videoId' => '827615267', 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg'],
    ['title' => 'LE NOUVEAU CALENDRIER SCOLAIRE', 'videoId' => '827615267', 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg' ],
    ['title' => "JOURNÉE MONDIALE CONTRE L'ABANDON DES ANIMAUX", 'videoId' => '827615267', 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg' ],
    ['title' => 'FÊTE DES PÈRES : ORIGINES', 'videoId' => '827615267', 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg' ],
    ['title' => 'FÊTE DES MÈRES : ORIGINES', 'videoId' => '827615267' ,'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg' ],
    ['title' => 'CARNAVAL : ORIGINES', 'videoId' => '827615267', 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg' ],
    ['title' => 'SADAKO SASAKI - UN SYMBOLE DE PAIX', 'videoId' => '827615267', 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg' ],
    ['title' => "LES PREMIERS PAS DE L'HOMME SUR LA LUNE", 'videoId' => '827615267', 'img' => 'https://flowbite.com/docs/images/blog/image-1.jpg' ],
];
@endphp
<x-layout>
    <x-slot name="title">Poésie et contes signés</x-slot>

    <h1 class="flex justify-center uppercase text-5xl font-bold dark:text-white">
        Poésie et contes signés
    </h1>

    <section class="flex justify-evenly flex-wrap gap-4 mt-8">
        @foreach ($titles as $video)
            <x-vimeo-thumbnail :title="$video['title']" :vimeoId="$video['videoId']" :img="$video['img']"/>
        @endforeach
    </section>
</x-layout>

@php
$titles = [
    ['title' => '21 JUILLET : ORIGINES DE LA FÊTE NATIONALE', 'videoId' => '827615267', 'img' => asset('img/info/1_FETE_NATIONAL_21 JUILLET.png')],
    ['title' => 'LES ABEILLES EN DANGER', 'videoId' => '827615267','img' => asset('img/info/2_ABEILLES_EN _DANGER.png')],
    ['title' => '8 MARS : JOURNEE DE LA FEMME', 'videoId' => '827615267', 'img' => asset('img/info/3_JOURNEE_DE_LA_FEMME.png')],
    ['title' => 'CHANDELEUR', 'videoId' => '827615267' , 'img' => asset('img/info/4_CHANDELEUR.png')],
    ['title' => 'ARMISTICE DE LA 1ERE GUERRE MONDIALE" ', 'videoId' => '827615267', 'img' => asset('img/info/5_ARMISTICE_GUERRE_MONDIALE.png')],
    ['title' => 'OCTOBRE ROSE', 'videoId' => '827615267', 'img' => asset('img/info/6_OCTOBRE_ROSE.png')],
    ['title' => 'FÊTE DE LA COMMUNAUTE FRANCAISE', 'videoId' => '827615267', 'img' => asset('img/info/7_FETE_COMMUNAUTE_FRANCAISE.png')],
    ['title' => 'JOURNÉE MONDIALE DES LANGUES DES SIGNES', 'videoId' => '827615267', 'img' => asset('img/info/8_JOURNEE_MONDIALE_DES_LANGUES_DES_SIGNES.png')],
    ['title' => 'LE NOUVEAU CALENDRIER SCOLAIRE', 'videoId' => '827615267', 'img' => asset('img/info/9_NOUVEAU_CALENDRIER_SCOLAIRE.png') ],
    ['title' => "JOURNÉE MONDIALE CONTRE L'ABANDON DES ANIMAUX", 'videoId' => '827615267', 'img' => asset('img/info/10_ABANDON_ANIMAUX.png') ],
    ['title' => 'FÊTE DES PÈRES : ORIGINES', 'videoId' => '827615267', 'img' => asset('img/info/11_FETE_DES_PERES.png') ],
    ['title' => 'FÊTE DES MÈRES : ORIGINES', 'videoId' => '827615267' ,'img' => asset('img/info/12_FETE_DES_MERES.png') ],
    ['title' => 'CARNAVAL : ORIGINES', 'videoId' => '827615267', 'img' => asset('img/info/13_CARNAVAL.png') ],
    ['title' => 'SADAKO SASAKI - UN SYMBOLE DE PAIX', 'videoId' => '827615267', 'img' => asset('img/info/14_SADAKO_SASAKI.png') ],
    ['title' => "LES PREMIERS PAS DE L'HOMME SUR LA LUNE", 'videoId' => '827615267', 'img' => asset('img/info/15_PREMIER_PAS_SUR_LA LUNE.png') ],
    ['title' => 'GUERNICA', 'videoId' => '827615267', 'img' => asset('img/info/16_GUERNICA.png')],
    ['title' => 'HALLOWEEN: ORIGINES', 'videoId' => '827615267', 'img' => asset('img/info/17_HALLOWEEN.png')],
    ['title' => 'POPPY APPEAL', 'videoId' => '827615267', 'img' => asset('img/info/18_POPPY_APPEAL.png')],
    ['title' => 'LA LEGENDE DU CHEVAL BAYARD', 'videoId' => '827615267', 'img' => asset('img/info/19_LA_LEGENDE_DU_CHEVAL_BAYARSD.png')],
    ['title' => 'TRADITIONS DE NOËL', 'videoId' => '827615267', 'img' => asset('img/info/20_TRADITIONS_DE_NOEL.png')],
    ['title' => 'TRADITIONS DE SAINT NICOLAS', 'videoId' => '827615267', 'img' => asset('img/info/21_TRADITIONS_DE_SAINT_NICOLAS.png')],
    ['title' => 'LA GALETTE DES ROIS', 'videoId' => '827615267', 'img' => asset('img/info/22_GALETTE_DES_ROIS.png')],
    ['title' => 'LES SERRES ROYALES DE LAEKEN', 'videoId' => '827615267', 'img' => asset('img/info/23_SERRESROYALES_LAEKEN.png')],
    ['title' => 'LUCIEN BLANVILLAIN, PREMIER SOLDAT SOURD', 'videoId' => '827615267', 'img' => asset('img/info/24_LUCIEN_BLANVILLAIN.png')],
    ['title' => 'LA CATASTROPHE DE TCHERNOBYL', 'videoId' => '827615267', 'img' => asset('img/info/25_CATASTROPHE_DE_TCHERNOBYL.png')],
    ['title' => 'EDITH CAVELL, UNE INFIRMIÈRE HÉROÏQUE', 'videoId' => '827615267', 'img' => asset('img/info/29_EDITH_CAVELL.png')],
    ['title' => 'NOTRE DAME DE PARIS', 'videoId' => '827615267', 'img' => asset('img/info/30_NOTRE_DAME_DE_PARIS.png')],
    ['title' => 'CORONAVIRUS : SUITE', 'videoId' => '827615267', 'img' => asset('img/info/33_CORONAVIRUS_SUITE.png')],
    ['title' => 'CORONAVIRUS : DÉCONFINEMENT', 'videoId' => '827615267', 'img' => asset('img/info/32_CORONAVIRUS_DECONFINEMENT.png')],
    ['title' => 'CORONAVIRUS', 'videoId' => '827615267', 'img' => asset('img/info/31_CORONAVIRUS.png')]
];
@endphp
<x-layout>
    <x-slot name="title">Vue sur l'info</x-slot>

    <h1 class="flex justify-center uppercase text-5xl font-bold dark:text-white">
        Vue sur l'info
    </h1>

    <section class="flex justify-evenly flex-wrap gap-4 mt-8">
        @foreach ($titles as $video)
            <x-vimeo-thumbnail :title="$video['title']" :vimeoId="$video['videoId']" :img="$video['img']"/>
        @endforeach
    </section>
</x-layout>

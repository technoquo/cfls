<x-layout>
  
    <x-slot name="title">L' équipe</x-slot>

    @php
        $teamGroups = [
            'Organisation' => [
                [
                    'name' => 'Raymonde Ahn',
                    'role' => 'Présidente',
                    'image' =>
                        'https://static.wixstatic.com/media/beceb7_762ff0cdeb994cbbbfee073b1f4197a7~mv2.png/v1/fill/w_131,h_184,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/IMG-20210828-WA0001_edited_edited_edited_edited.png',
                ],
                [
                    'name' => 'Catherine Rotschild',
                    'role' => 'Vice-présidente',
                    'image' =>
                        'https://static.wixstatic.com/media/beceb7_002099a500244ce7b09a3eb7b7fd4890~mv2.png/v1/fill/w_131,h_184,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/IMG_0318_edited_edited_edited_edited.png',
                ],
                [
                    'name' => 'Martine Fraiture',
                    'role' => 'Trésorière',
                    'image' =>
                        'https://static.wixstatic.com/media/beceb7_a961e4c434d24ee898f413c4305d7385~mv2.png/v1/fill/w_131,h_184,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/Martine%252520complet_edited_edited_edited.png',
                ],
            ],
            'Personnel' => [
                [
                    'name' => 'Muriel Denies',
                    'role' => 'Assistante administrative',
                    'image' =>
                        'https://static.wixstatic.com/media/beceb7_3b726f31b220436ab9ba676aba2c4bae~mv2.png/v1/fill/w_131,h_184,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/1635863864447_edited_edited.png',
                ],
                [
                    'name' => 'Annick Bouffioux',
                    'role' => 'Coordinatrice pédagogique, Animatrice',
                    'image' =>
                        'https://static.wixstatic.com/media/beceb7_b68ef9116b8b427880e806bfe7fd6ad2~mv2.png/v1/crop/x_26,y_0,w_535,h_736/fill/w_131,h_184,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/annick%2525252520ok_edited_edited_edited_edited_edited.png',
                ],
                [
                    'name' => 'Saïda Rahmoun',
                    'role' => 'Secrétaire - Comptable',
                    'image' =>
                        'https://static.wixstatic.com/media/beceb7_1866351983d94ed6a6bfe060c180fefa~mv2.png/v1/crop/x_57,y_0,w_1069,h_1471/fill/w_131,h_184,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/20190826_225627_edited_edited_edited.png',
                ],
            ],
        ];
    @endphp

    @foreach ($teamGroups as $groupName => $groupMembers)
        <div class="text-center">
            <h2 class="text-3xl font-extrabold dark:text-white sm:text-4xl animate__flipInY">
                {{ $groupName }}
            </h2>
        </div>
        <x-team-section :teamMembers="$groupMembers" />
    @endforeach

</x-layout>

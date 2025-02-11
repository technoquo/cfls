    @php
    $titles = [
        ['title' => '1er avril', 'videoId' => '827615267'],
        ['title' => '"Au soleil" - Guillaume Apollinaire', 'videoId' => '827615267'],
        ['title' => '"Marine" - Paul Verlaine', 'videoId' => '827615267'],
        ['title' => '"Marine" - Paul Verlaine', 'videoId' => '827615267'],
        ['title' => '"Le Corbeau Et Le Renard" - Jean De La Fontaine" - ', 'videoId' => '827615267'],
        ['title' => '"Printemps" - Victor Hugo', 'videoId' => '827615267'],
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
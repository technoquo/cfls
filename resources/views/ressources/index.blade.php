@php
$vimeos = $videos->map(function ($video) {
    return [
        'title' => $video->title,
        'videoId' => $video->code_vimeo,
        'slug' => $video->slug,
        'img' => $video->image ? asset($video->image) : " ",
    ];
})->all();
@endphp

<x-layout>
   
    <x-slot name="title">{!! $category->name !!}</x-slot>
    
    <h1 class="flex justify-center uppercase text-5xl font-bold dark:text-white">
        {{ $category->name }}
    </h1>

    <section class="flex justify-evenly flex-wrap gap-4 mt-8">
        @foreach ($vimeos as $video)
        
            <x-vimeo-thumbnail 
                :title="$video['title']" 
                :vimeo="$video['videoId']" 
                :img="$video['img']" 
                :video-slug="$video['slug']" 
                :category="$category->slug" 
            />
        @endforeach
    </section>
</x-layout>

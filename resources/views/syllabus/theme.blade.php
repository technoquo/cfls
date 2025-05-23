@php
    $chunks = $themes->chunk(3); // Divide en filas de 3
@endphp

<x-layout>
    <x-slot name="title">Syllabus</x-slot>

    <div class="flex justify-center">
        <h2 class="font-semibold text-gray-800 dark:text-gray-200 mb-5 md:text-7xl text-3xl uppercase">
            {{ $syllabu->formatted_title }}
        </h2>
    </div>

    <div class="w-full max-w-screen-lg mx-auto px-4">
        @foreach($chunks as $chunk)
            <div class="flex flex-col md:flex-row justify-center gap-4 mb-4">
                @foreach($chunk as $index => $theme)
                    <div class="p-6 w-full md:w-1/3 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex items-center justify-center text-center h-48">
                        <a href="{{ route('syllabus.theme', ['slug' => $slug, 'theme' => $theme->slug]) }}" class="flex flex-col items-center">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center uppercase">
                                {{  $index + 1 }} - {{ $theme->title }}
                            </h5>
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</x-layout>

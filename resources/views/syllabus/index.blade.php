<x-layout>
    <x-slot name="title">Syllabus</x-slot>


    <div class="w-fit mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4 justify-center">
            @foreach($syllabus as $syllabu)
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex items-center justify-center text-center h-48">
                    <a href="{{ route('syllabus.slug', $syllabu->slug) }}" class="flex flex-col items-center justify-center">
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white uppercase">
                            {{ $syllabu->title }}
                        </h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>

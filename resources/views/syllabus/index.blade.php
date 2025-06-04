<x-layout>
    <x-slot name="title">Syllabus</x-slot>

    <div class="w-full max-w-screen-xl mx-auto">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6">
            @foreach($syllabus as $syllabu)
                <div class="p-4 bg-white dark:bg-slate-900 rounded-xl shadow-sm flex flex-col items-center justify-center text-center w-full h-auto">
                    <a href="{{ route('syllabus.slug', $syllabu->slug) }}" class="flex flex-col items-center justify-center w-full">
                        <img src="{{ asset('storage/' . $syllabu->image) }}"
                             alt="{{ $syllabu->title }}"
                             class="w-11/12 sm:w-4/5 mb-4 rounded-full aspect-square">
                        <span class="text-lg font-medium text-gray-800 dark:text-white uppercase">{{ $syllabu->title }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>

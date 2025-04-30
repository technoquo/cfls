<x-layout>
    <x-slot name="title">Syllabus</x-slot>

    <div class="w-full max-w-screen-xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6 place-items-center">
            @foreach($syllabus as $syllabu)
                <div class="p-6 bg-white dark:bg-slate-900 rounded-xl shadow-sm flex items-center justify-center text-center h-96 w-full max-w-xs">
                    <a href="{{ route('syllabus.slug', $syllabu->slug) }}" class="flex flex-col items-center justify-center w-full">
                        <img src="{{ asset('storage/' . $syllabu->image) }}" alt="{{ $syllabu->title }}" class="w-52 h-52 mb-4 rounded-full object-cover">
                        <span class="text-lg font-medium text-gray-800 dark:text-white">{{ $syllabu->name }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>

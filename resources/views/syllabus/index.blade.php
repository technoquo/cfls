<x-layout>
    <x-slot name="title">Syllabus</x-slot>


  @foreach($syllabus as $syllabu)
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <a href="{{ route('syllabus.slug', $syllabu->slug) }}" class="flex flex-col items-center">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center uppercase">{{ $syllabu->title }}</h5>
        </a>
    </div>
    @endforeach

</x-layout>

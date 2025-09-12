<x-layout>
    <style>
        .general > ol > li {
            color: black; /* White color for light mode */
            font-size: 1.1rem;
        }
        .dark .general > ol > li {
            color: white;/* Black color for dark mode */

        }
    </style>
    <x-slot name="title">Politique de confidentialité | C.F.L.S. asbl</x-slot>
    <div class="flex justify-center items-center min-h-screen w-full bg-gray-100 dark:bg-gray-800 px-4 py-6">
        <div class="w-full max-w-2xl mx-auto mt-6">
            <h1 class="mb-4 mt-8 md:text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center uppercase">
                {{$data['title']}}
            </h1>
            <div class="w-full dark:text-white general prose prose-lg dark:prose-invert text-black">
                {!! $data['content'] !!}
            </div>
        </div>
    </div>
</x-layout>

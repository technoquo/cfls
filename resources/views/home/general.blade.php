<x-layout>
    <x-slot name="title">Politique de confidentialité | C.F.L.S. asbl</x-slot>
    <div class="flex items-center justify-center min-h-screen w-full bg-gray-100 dark:bg-gray-800 px-4 py-6">
        <div class="w-full mt-6">
            <h1 class="mb-6 font-extrabold leading-none tracking-tight text-center text-xl sm:text-2xl md:text-3xl lg:text-4xl dark:text-white">
                {{$data['title']}}
            </h1>
            <div class="w-full dark:text-white">
                {!! $data['content'] !!}
            </div>
        </div>
    </div>
</x-layout>


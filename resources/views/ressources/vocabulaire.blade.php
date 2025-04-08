<x-layout>
    <x-slot name="title">Vocabulaires</x-slot>
    <h1 class="flex justify-center uppercase text-5xl font-bold dark:text-white">
        Vocabulaires
    </h1>
    <section class="bg-white dark:bg-gray-900 mb-4">
        <div class="max-w-screen-2xl px-4 py-8 mx-auto space-y-12">
            @foreach ($videos as $vimeo) 
               
            <div class="mt-4 mb-4">
                <h2
                    class="mb-4 sm:text-sm  md:text-2xl lg:text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center uppercase">
                    {{ $vimeo->title }}
                </h2>

                <!-- Main Video Player -->
                <div class="flex justify-center">
                    <iframe src="https://player.vimeo.com/video/{{ $vimeo->code_vimeo }}"
                        class="md:w-1/2 lg:w-1/2 w-full aspect-video" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
            @endforeach
        </div>
    </section>

</x-layout>

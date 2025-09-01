<x-layout>

    <x-slot name="title">L' équipe</x-slot>


    @foreach ($teamGroups->groupBy('organe') as $organe => $groupMembers)
        <div class="text-center mb-4 p-2">
            <h2 class="mb-4 mt-8 md:text-3xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center uppercase">
                {{ json_decode($organe)->name }}
            </h2>
            <div class="flex justify-center mx-auto">
                    <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400 text-sm md:text-base lg:text-lg">
                        Découvrez chaque membre de notre équipe à travers son signe distinctif :
                        la vidéo se lance automatiquement lorsque vous passez la souris sur l’image
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 dark:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672Zm-7.518-.267A8.25 8.25 0 1 1 20.25 10.5M8.288 14.212A5.25 5.25 0 1 1 17.25 10.5" />
                        </svg>
                    </div>
            </div>
        </div>
        <x-team-section :teamMembers="$groupMembers" />
    @endforeach

</x-layout>

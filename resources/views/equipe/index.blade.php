<x-layout>

    <x-slot name="title">L' équipe</x-slot>


    @foreach ($teamGroups->groupBy('organe') as $organe => $groupMembers)
        <div class="text-center mb-4 p-2">
            <h2 class="mb-4 mt-8 md:text-3xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center uppercase">
                {{ json_decode($organe)->name }}
            </h2>
        </div>
        <x-team-section :teamMembers="$groupMembers" />
    @endforeach

</x-layout>

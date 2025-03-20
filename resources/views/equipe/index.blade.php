<x-layout>
  
    <x-slot name="title">L' équipe</x-slot>


    @foreach ($teamGroups->groupBy('organe') as $organe => $groupMembers)
        <div class="text-center mb-4 p-2">
            <h2 class="text-3xl font-extrabold dark:text-white sm:text-4xl animate__flipInY">
                {{ json_decode($organe)->name }}
            </h2>
        </div>
        <x-team-section :teamMembers="$groupMembers" />
    @endforeach

</x-layout>

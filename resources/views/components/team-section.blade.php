<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-12">
    @foreach ($teamMembers as $member)
        <div class="flex flex-col items-center dark:bg-gray-900 rounded-lg overflow-hidden relative">
            <div>
                <!-- Imagen principal -->
                <livewire:rotating-image :images="[
                    $member['image'],
                    $member['image_two'],
                    $member['image_three'],
                ]"/>
            </div>

            <div class="p-6 text-center">
                <h3 class="text-xl font-semibold dark:text-white">{{ $member->user->name }}</h3>
                <p class="mt-2 text-base text-black dark:text-gray-400">{{ $member->position->name }}</p>
            </div>
        </div>
    @endforeach
</div>

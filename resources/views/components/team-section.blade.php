<div class="dark:bg-gray-800 py-16 lg:py-24">
    <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
        <div class="mt-12 grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($teamMembers as $member)
                <div class="flex flex-col items-center  dark:bg-gray-900 rounded-lg overflow-hidden shadow-xl">
                    <img class=" rounded  mt-4" src="{{ asset('storage/'. $member['image']) }}" alt="{{ $member->user->name }}">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-semibold dark:text-white">{{ $member->user->name }}</h3>
                        <p class="mt-2 text-base dark:text-gray-400">{{ $member->position->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

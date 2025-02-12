<div class="dark:bg-gray-800 py-16 lg:py-24">
    <div class="max-w-screen-2xl mx-auto px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold dark:text-white sm:text-4xl">
                L'Organe d'Administration
            </h2>
            
        </div>

        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($teamMembers as $member)
                <div class="flex flex-col items-center  dark:bg-gray-900 rounded-lg overflow-hidden shadow-xl">
                    <img class=" rounded  mt-4" src="{{ $member['image'] }}" alt="{{ $member['name'] }}">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-semibold dark:text-white">{{ $member['name'] }}</h3>
                        <p class="mt-2 text-base dark:text-gray-400">{{ $member['role'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

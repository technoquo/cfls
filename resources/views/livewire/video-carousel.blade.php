<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($vimeos as $vimeo)
  
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <a wire:navigate href="{{ route('ressources.vimeo', ['category' => $vimeo->category->slug, 'slug' => $vimeo->slug]) }}">
                <img class="rounded-t-lg" src="{{ asset($vimeo['image']) }}" alt="{{ $vimeo['title'] }}" />
            </a>
            <div class="p-5">
                <a wire:navigate href="{{ route('ressources.vimeo', ['category' => $vimeo->category->slug, 'slug' => $vimeo->slug]) }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ $vimeo['title'] }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $vimeo['description'] }}</p>
                <div class="text-center mt-4">
                    <a wire:navigate href="{{ route('ressources.vimeo', ['category' => $vimeo->category->slug, 'slug' => $vimeo->slug]) }} class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

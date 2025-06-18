@props(['slug'])

<nav class="bg-gray-50 dark:bg-gray-700 mb-5">
    <div class="max-w-screen-xl mx-auto px-4 py-3">
        <div
            x-data
            x-init="
                const savedScroll = sessionStorage.getItem('formationScroll') || 0;
                $el.scrollLeft = parseInt(savedScroll);
                $el.addEventListener('scroll', () => {
                    sessionStorage.setItem('formationScroll', $el.scrollLeft);
                });
            "
            class="w-full overflow-x-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-transparent"
        >
            <ul class="flex flex-nowrap justify-start sm:justify-center items-center font-medium text-sm sm:text-base md:text-lg lg:text-xl gap-3 sm:gap-6 whitespace-nowrap pl-4 pr-4 snap-x">
                @php
                    $formations = App\Models\Formations::where('status', 1)->select('slug', 'title')->get();
                @endphp

                @if($formations->isEmpty())
                    <li class="text-gray-500 dark:text-gray-300">Pas de formations actives disponibles.</li>
                @else
                    @foreach ($formations as $formation)
                        <li class="snap-start">
                            <a
                                href="{{ route('formations.slug', ['slug' => $formation->slug]) }}"
                                wire:navigate
                                class="block px-3 py-2 rounded-md transition-colors duration-300
                                    {{ $slug === $formation->slug
                                        ? 'text-cyan-600 bg-cyan-100 dark:bg-cyan-900 dark:text-white'
                                        : 'text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600' }}"
                            >
                                {{ $formation->title ?? 'Formation sans titre' }}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>




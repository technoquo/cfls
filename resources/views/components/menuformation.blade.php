@props(['slug'])

<nav class="bg-gray-50 dark:bg-gray-700 mb-5"> 
   
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center justify-center">
            <ul class="flex flex-row font-medium mt-0 space-x-4 sm:space-x-8 rtl:space-x-reverse text-sm sm:text-base md:text-2xl">
                @php
                    $formations = App\Models\Formations::where('status', 1)->select('slug', 'title')->get();
                @endphp

                @if($formations->isEmpty())
                    <li>Pas de formations actives disponibles.</li>
                @else
                    @foreach ($formations as $formation)
                        <li>
                            <a 
                                href="{{ route('formations.slug', ['slug' => $formation->slug]) }}" 
                                wire:navigate 
                                class="text-gray-900 dark:text-white hover:underline p-2 rounded-md transition-colors duration-300 {{ $slug === $formation->slug ? 'text-cyan-600 bg-cyan-100 dark:bg-cyan-900' : '' }}"
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
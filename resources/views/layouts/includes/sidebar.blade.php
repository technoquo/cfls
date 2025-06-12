 {{-- menu for movil --}}
 <aside
     id="logo-sidebar"
     class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform duration-300 ease-in-out bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 [@media(min-width:1450px)]:hidden"
     :class="{
    'translate-x-0': open,
    '-translate-x-full': !open,
  }"
     x-cloak
     aria-hidden="true"
     aria-label="Sidebar"
 >
 <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
     <ul class="space-y-2 font-medium">
         <li>
             <a href="/"
                 class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-csfl dark:hover:bg-gray-700 group">
                 <span class="ms-3">Accueil</span>
             </a>
         </li>
         <li>
            <a href="{{ route('equipe') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-csfl dark:hover:bg-gray-700 group">
                <span class="ms-3">Qui sommes-nous ?</span>
            </a>
        </li>
         <li>
             <a href="{{ route('formations.index') }}"
                 class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-csfl dark:hover:bg-gray-700 group">
                 <span class="ms-3">Formations</span>
             </a>
         </li>
         <li x-data="{ openVideos: false }">
             <!-- Botón de toggle -->
             <button
                 @click="openVideos = !openVideos"
                 class="flex items-center justify-between w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-csfl dark:hover:bg-gray-700 group"
             >
                 <span class="ms-3">Videos</span>
                 <svg :class="{ 'rotate-90': openVideos }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                      stroke-width="2" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                 </svg>
             </button>

             <!-- Submenú desplegable -->
             <ul x-show="openVideos" x-collapse class="pl-6 mt-2 space-y-1">
                 @php
                     $categories = App\Models\Category::whereStatus(1)
                         ->whereType('video')
                         ->get();
                 @endphp
                 @foreach ($categories as $category)
                     <li>
                         <a href="{{ route('ressources.slug', $category->slug) }}"
                            class="block p-2 text-gray-900 rounded-lg dark:text-white hover:bg-csfl dark:hover:bg-gray-700">
                             {{ $category->name }}
                         </a>
                     </li>
                 @endforeach
             </ul>
         </li>
         <li>
             <a  href="/ressources/mots-croises"
                 class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-csfl dark:hover:bg-gray-700 group">
                 <span class="ms-3">Mots croisés</span>
             </a>
         </li>
        <li>
            <a href="{{ route('boutique.index') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-csfl dark:hover:bg-gray-700 group">
                <span class="ms-3">Boutique</span>
            </a>
        </li>

        <li>
            <a href="{{ route('contact') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-csfl dark:hover:bg-gray-700 group">
                <span class="ms-3">Contact</span>
            </a>
        </li>
     </ul>
 </div>
</aside>
 <div
     x-show="open"
     x-on:click="open = false"
     class="fixed inset-0 z-30 bg-black bg-opacity-50 [@media(min-width:1450px)]:hidden"
     style="display: none"
 ></div>

 {{-- menu for movil --}}
 <aside
 id="logo-sidebar"
 class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform duration-300 ease-in-out bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 md:hidden"
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
                <span class="ms-3">Qui sommes</span>
            </a>
        </li>
         <li>
             <a href="{{ route('formations.index') }}"
                 class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-csfl dark:hover:bg-gray-700 group">
                 <span class="ms-3">Formations</span>
             </a>
         </li>
         <li>
            <!-- Parent item (Ressources) -->
            <div class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-csfl dark:hover:bg-gray-700 group">
                <span class="ms-3">Ressources</span>
            </div>
            <!-- Nested list -->
            <ul class="pl-4">
                @php
                    $categories = App\Models\Category::where('status', 1)->get();
                @endphp
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('ressources.slug', $category->slug) }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-csfl dark:hover:bg-gray-700 group">
                            <span class="ms-3">{{ $category->name }}</span>
                        </a>
                    </li>
                @endforeach
             
            </ul>
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
class="fixed inset-0 z-30 bg-black bg-opacity-50 md:hidden"
style="display: none"
></div>
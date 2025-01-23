 {{-- menu for movil --}}
 <aside id="logo-sidebar"
 class="fixed md:hidden top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
 :class="{ 
 'transform-none': open,
 '-translate-x-full': !open,
 'hidden': !open
}" aria-hidden="true" aria-label="Sidebar">
 <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
     <ul class="space-y-2 font-medium">
         <li>
             <a href="#"
                 class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <span class="ms-3">Accueil</span>
             </a>
         </li>
         <li>
             <a href="#"
                 class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <span class="ms-3">Formations</span>
             </a>
         </li>
         <li>
             <a href="#"
                 class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <span class="ms-3">Video</span>
             </a>
         </li>
         <li>
            <a href="#"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <span class="ms-3">Qui sommes</span>
            </a>
        </li>
        <li>
            <a href="#"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <span class="ms-3">Contact</span>
            </a>
        </li>
     </ul>
 </div>
</aside>

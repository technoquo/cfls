<div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white  dark:hover:text-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 text-2xl">
      <li>
        <a href="/" wire:navigate class="block py-2 px-3 {{ request()->routeIs('home') ? 'text-csfl' : 'dark:text-white' }}  rounded md:bg-transparent md:p-0  md:hover:text-csfl">Accueil</a>
      </li>
      <li>
        <a href="{{ route('equipe') }}" wire:navigate class="block py-2 px-3 {{ request()->routeIs('equipe') ? 'text-csfl' : 'dark:text-white' }}  rounded md:bg-transparent md:p-0  md:hover:text-csfl">Qui sommes-nous</a>
      </li>
      <li>          
        <a  wire:navigate href="{{ route('formations.index') }}" class="block py-2 px-3 {{ request()->routeIs('formations.index') ? 'text-csfl' : 'dark:text-white' }}  rounded md:bg-transparent md:p-0  md:hover:text-csfl">Formations</a>
      </li>
      <li x-data="{ open: false }">
        <!-- Enlace principal de "Ressources" -->
        <a 
        href="#" 
        @click.prevent="open = !open" 
        :class="open ? 'text-csfl' : 'dark:text-white'" 
        class="block py-2 px-3 rounded md:bg-transparent md:p-0 md:hover:text-csfl"
         >
          Ressources
        </a>
        <!-- Submenú -->
        <ul 
            style="display: none;"
            x-show="open" 
            @click.outside="open = false" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="absolute  mt-2 bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 md:mt-0 md:shadow-none md:bg-csfl md:dark:bg-transparent z-10">

          @foreach($this->submenus as $submenu)
          <li class="text-xl"><a wire:navigate href="ressources/{{ $submenu->slug }}" class="block py-2 px-4 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{ $submenu->name }}</a></li>
         
           @endforeach
        </ul>
      </li>
      <li>
        <a wire:navigate href="{{ route('boutique.index') }}" class="{{ request()->routeIs('boutique.index') ? 'text-csfl' : 'dark:text-white' }}  rounded md:bg-transparent md:p-0  md:hover:text-csfl">Boutique</a>
      </li>       
      <li>
        <a wire:navigate href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-csfl' : 'dark:text-white' }}  rounded md:bg-transparent md:p-0  md:hover:text-csfl">Contact</a>
      </li>
    </ul>
  </div>
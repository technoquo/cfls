

<nav class="bg-white border-gray-200 dark:bg-gray-900 mb-7">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img  class="object-contain w-32 h-auto" src="{{ asset('img/cfls.png') }}"  alt="CLFS Logo" />
      
    </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button  type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
        </button>
        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
          </div>
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
            </li>
          </ul>
        </div>
        <div x-data="themeSwitcher()" class="flex justify-end py-4 px-3">
            <button @click="toggleTheme()" class="ml-7">
                <img class="w-16 h-16" x-bind:src="image" id="switch" alt="Theme Icon"  />
            </button>
        </div>
        <button x-on:click="open = !open"  data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white  dark:hover:text-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 text-2xl">
        <li>
          <a href="/" class="block py-2 px-3 {{ request()->routeIs('home') ? 'text-csfl' : 'dark:text-white' }}  rounded md:bg-transparent md:p-0  md:hover:text-csfl">Accueil</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-csfl md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Qui sommes-nous</a>
        </li>
        <li>          
          <a href="{{ route('formations.index') }}" class="block py-2 px-3 {{ request()->routeIs('formations.index') ? 'text-csfl' : 'dark:text-white' }}  rounded md:bg-transparent md:p-0  md:hover:text-csfl">Formations</a>
        </li>
        <li x-data="{ open: false }">
          <!-- Enlace principal de "Ressources" -->
          <a 
          href="#" 
          @click.prevent="open = !open" 
          class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-csfl md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
           >
            Ressources
          </a>
          <!-- Submenú -->
          <ul 
              x-show="open" 
              @click.outside="open = false" 
              x-transition:enter="transition ease-out duration-300"
              x-transition:enter-start="opacity-0 transform scale-95"
              x-transition:enter-end="opacity-100 transform scale-100"
              x-transition:leave="transition ease-in duration-200"
              x-transition:leave-start="opacity-100 transform scale-100"
              x-transition:leave-end="opacity-0 transform scale-95"
              class="absolute mt-2 bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 md:mt-0 md:shadow-none md:bg-csfl md:dark:bg-transparent z-10">
            <li class="text-xl"><a href="#" class="block py-2 px-4 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Vidéos</a></li>
            <li class="text-xl"><a href="#" class="block py-2 px-4 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Mots Croisés</a></li>
            <li class="text-xl"><a href="{{ route('ressources.videoinfo') }}" class="block py-2 px-4 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Vue Sur L'info</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-csfl md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Boutique</a>
        </li>       
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-csfl md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>
  @push('scripts')
       
        <script>
   function themeSwitcher() {
        return {
            // Estado inicial basado en localStorage o tema predeterminado
            theme: localStorage.getItem('theme') || 'light',
            
            // Imagen inicial basada en el tema guardado
            image: localStorage.getItem('theme') === 'dark'
                ? '{{ asset('img/sombre.png') }}'
                : '{{ asset('img/clair.png') }}',

            // Función para alternar el tema
            toggleTheme() {
                console.log(this.theme);

                // Alternar entre 'dark' y 'light'
                this.theme = this.theme === 'dark' ? 'light' : 'dark';

                // Actualizar la imagen según el tema
                this.image = this.theme === 'light'
                    ? '{{ asset('img/clair.png') }}'
                    : '{{ asset('img/sombre.png') }}';


                // Actualizar la clase en el elemento <html>
                document.documentElement.classList.toggle('dark', this.theme === 'dark');
                document.documentElement.classList.toggle('light', this.theme === 'light');

                // Guardar la preferencia en localStorage
                localStorage.setItem('theme', this.theme);
            }
        };
    }
           
        </script>
    @endpush
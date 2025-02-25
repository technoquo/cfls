<x-layout>
  <x-slot name="title">Calendrier 2024 - 2025</x-slot>
  <x-menuformation :slug="$slug" />

  <h2 class="mb-8 text-7xl tracking-tight font-extrabold text-gray-900 dark:text-white text-center">Calendrier 2024 - 2025</h2>
  <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">

    <a x-bind:href="false"
        class="flex flex-col items-center rounded-lg border border-gray-200 bg-gray-200 px-4 py-6 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700   cursor-not-allowed opacity-50 pointer-events-non">
        <img src="https://static.wixstatic.com/media/beceb7_4e59b5524ebf47e69c004901efca4814~mv2.png/v1/fill/w_271,h_383,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/beceb7_4e59b5524ebf47e69c004901efca4814~mv2.png" alt="placeholder" class="w-full max-w-[150px] sm:max-w-[200px] h-auto object-cover rounded-lg mb-4">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Formation accélérée - Carnaval Niv.1
        </h5>
        <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Niveau 1, du 24 au 28/02/2025 </p>
        <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Prix : 175 €</p>
        <div
            class="text-white bg-red-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            fermé</div>
    </a>

    <a href="{{ route('formation', ['slug' => $slug ,'formation' => 'formation-accélérée-carnaval-niv-2']) }}"
        class="flex flex-col items-center rounded-lg border border-gray-200 bg-gray-200 px-4 py-6 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img src="https://static.wixstatic.com/media/beceb7_ae8f090efb644d6391ddefd3aef78231~mv2.png/v1/fill/w_271,h_383,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/beceb7_ae8f090efb644d6391ddefd3aef78231~mv2.png" alt="placeholder" class="w-full max-w-[150px] sm:max-w-[200px] h-auto object-cover rounded-lg mb-4">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Formation accélérée - Carnaval Niv.2
        </h5>
        <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Niveau 2, du 03 au 07/03/2025</p>
        <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Prix : 175 €</p>
        <div
            class="text-white bg-csfl hover:bg-cyan-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Inscription</div>
    </a>


    <a href="{{ route('formation', ['slug' => $slug ,'formation' => 'formation-accélérée-carnaval-niv-2']) }}"
        class="flex flex-col items-center rounded-lg border border-gray-200  bg-gray-200 px-4 py-6 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img src="{{ asset('img/formations/PHOTO_FORMATION.png') }}" alt="placeholder"  class="w-full max-w-[150px] sm:max-w-[200px] h-auto object-cover rounded-lg mb-4">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Formation accélérée - Printemps Niv.1</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Niveau 1, du 28/04 au 02/05/2025 
            (4 jours de formation → 01/05 jour férié)</p>
        <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Prix : 150 €</p>
        <div
            class="text-white bg-csfl hover:bg-cyan-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Inscription</div>
    </a>

   <a href="{{ route('formation', ['slug' => $slug ,'formation' => 'formation-accélérée-carnaval-niv-2']) }}"
        class="flex flex-col items-center rounded-lg border border-gray-200 bg-gray-200 px-4 py-6 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img src="{{ asset('img/formations/PHOTO_FORMATION.png') }}" alt="placeholder"  class="w-full max-w-[150px] sm:max-w-[200px] h-auto object-cover rounded-lg mb-4">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Formation accélérée - Printemps Niv.2
        </h5>
        <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Niveau 1, du 28/04 au 02/05/2025 
            (4 jours de formation → 01/05 jour férié)</p>
        <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Prix : 150 €</p>
        <div
            class="text-white bg-csfl hover:bg-cyan-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Inscription</div>
    </a>
</div>
</x-layout>
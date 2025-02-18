<nav class="bg-gray-50 dark:bg-gray-700 mb-5">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center justify-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse md:text-2xl text-sm">
                <li>
                    <a href="{{ route('formations.slug', ['slug' => 'formationsaccelerees']) }}" wire:navigate class="text-gray-900 dark:text-white hover:underline" >Formations accélérées</a>
                </li>
                <li>
                    <a href="{{  route('formations.slug', ['slug' => 'formationsalanee']) }}" wire:navigate class="text-gray-900 dark:text-white hover:underline">Formations à l'année</a>
                </li>
                <li>
                    <a href="{{  route('formations.slug', ['slug' => 'sensibilisations']) }}"  wire:navigate class="text-gray-900 dark:text-white hover:underline">Sensibilisations</a>
                </li>
                <li>
                    <a href="{{  route('formations.slug', ['slug' => 'coursprives']) }}" wire:navigate class="text-gray-900 dark:text-white hover:underline">Cours privés</a>
                </li>
                <li>
                    <a href="{{  route('formations.slug', ['slug' => 'tableconversation']) }}" wire:navigate class="text-gray-900 dark:text-white hover:underline">Tables de conversation</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
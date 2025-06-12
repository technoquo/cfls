<div
    x-data
    x-init="
    window.addEventListener('cart-updated', () => {
        const updated = JSON.parse(localStorage.getItem('cart')) || [];
        $store.cart.items.splice(0, $store.cart.items.length, ...updated);
    });
    "
    @open-slide-over.window="
    isOpen = true;
    selectedProductId = $event.detail?.id;
    "
    @close="isOpen = false"
    class="hidden [@media(min-width:1450px)]:flex items-center justify-between w-full md:w-auto md:order-1"
    id="navbar-user"
>
    <div role="list" class="hidden lg:flex flex-col lg:flex-row items-center justify-center font-medium text-2xl p-4 lg:p-0 mt-4 lg:mt-0 w-full box-border">
        <div role="listitem" class="px-4 py-2 min-w-[140px] text-center">
            <a wire:navigate href="/" class="{{ request()->routeIs('home') ? 'text-csfl' : 'text-black hover:text-gray-700' }}">Accueil</a>
        </div>
        <div role="listitem" class="px-4 py-2 min-w-[250px] text-center">
            <a wire:navigate href="{{ route('equipe') }}" class="{{ request()->routeIs('equipe') ? 'text-csfl' : 'text-black hover:text-gray-700' }}">Qui sommes-nous ?</a>
        </div>
        <div role="listitem" class="px-4 py-2 min-w-[140px] text-center">
            <a wire:navigate href="{{ route('formations.index') }}" class="{{ request()->routeIs('formations.index') ? 'text-csfl' : 'text-black hover:text-gray-700' }}">Formations</a>
        </div>
        <div role="listitem" x-data="{ open: false }" class="px-4 py-2 min-w-[140px] text-center relative">
            <a href="#" @click.prevent="open = !open"
               class="transition-colors duration-200 {{ request()->is('ressources/*') && !request()->is('ressources/mots-croises') ? 'text-csfl' : 'text-black hover:text-gray-700' }}">
                Vidéos
            </a>
            <div x-show="open" x-cloak @click.outside="open = false"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 role="list"
                 class="absolute top-full left-0 mt-2 w-60 bg-white rounded-lg shadow-lg dark:bg-gray-800 z-10"
            >
                @foreach($this->submenus as $submenu)
                    <div role="listitem">
                        <a wire:navigate href="{{ route('ressources.slug', ['slug' => $submenu->slug]) }}"
                           class="block px-4 py-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 text-center">
                            {{ $submenu->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div role="listitem" class="px-4 py-2 min-w-[180px] text-center">
            <a wire:navigate href="/ressources/mots-croises" class="{{ request()->is('ressources/mots-croises') ? 'text-csfl' : 'text-black hover:text-gray-700' }}">Mots croisés</a>
        </div>
        <div role="listitem" class="px-4 py-2 min-w-[140px] text-center">
            <a wire:navigate href="{{ route('boutique.index') }}" class="{{ request()->routeIs('boutique.index') ? 'text-csfl' : 'text-black hover:text-gray-700' }}">Boutique</a>
        </div>
        <div role="listitem" class="px-4 py-2 min-w-[140px] text-center">
            <a wire:navigate href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-csfl' : 'text-black hover:text-gray-700' }}">Contact</a>
        </div>
        <div class="ml-12 flex items-center justify-center space-x-8">
            <!-- Botón del carrito -->
            <div>
                <button @click="window.dispatchEvent(new CustomEvent('open-slide-over'))" class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                    <span
                        x-cloak
                        x-text="$store.cart.count"
                        x-show="$store.cart.count > 0"
                        class="absolute -top-2 -right-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full">
            </span>
                </button>
            </div>

            <!-- Redes sociales y switch -->
            <div class="flex items-center space-x-6">
                <!-- Facebook -->
                <a href="https://www.facebook.com/cfls.asbl" target="_blank" class="hover:opacity-80">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">Facebook</span>
                </a>

                <!-- Instagram -->
                <a href="https://www.instagram.com/cflsasbl" target="_blank" class="hover:opacity-80">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">Instagram</span>
                </a>

                <!-- WhatsApp -->
                <a href="https://wa.me/1234567890" target="_blank" class="hover:opacity-80">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.472-.148-.67.149-.197.297-.767.966-.94 1.164-.173.198-.347.223-.644.075-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.447-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.521-.075-.149-.669-1.611-.916-2.208-.242-.579-.487-.501-.669-.51l-.571-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.693.625.711.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.412.248-.694.248-1.288.173-1.412-.074-.124-.272-.198-.57-.347z"/>
                        <path d="M12.004 2.004a9.998 9.998 0 0 0-8.708 14.721L2 22l5.42-1.29a9.998 9.998 0 1 0 4.583-18.706zm0 18.175a8.177 8.177 0 0 1-4.166-1.147l-.298-.174-3.208.764.857-3.13-.197-.323a8.176 8.176 0 1 1 7.012 3.978z"/>
                    </svg>
                    <span class="sr-only">WhatsApp</span>
                </a>

                <!-- Switch de tema -->
                <div class="fixed top-4 right-4 z-[9999]">
                    @livewire('theme-switch')
                </div>

            </div>
        </div>
    </div>
</div>

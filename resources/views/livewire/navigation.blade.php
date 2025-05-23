<div  x-data
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
      class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">

    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border  rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0  text-2xl">
        <li>
            <a wire:navigate href="/"  class="{{ request()->routeIs('home') ? 'text-white' : 'text-black hover:text-gray-700' }}">Accueil</a>
        </li>
      <li>
        <a href="{{ route('equipe') }}" wire:navigate class="{{ request()->routeIs('equipe') ? 'text-white' : 'text-black hover:text-gray-700' }}">Qui sommes-nous ?</a>
      </li>
      <li>
        <a  wire:navigate href="{{ route('formations.index') }}" class="{{ request()->routeIs('formations.index')? 'text-white' : 'text-black hover:text-gray-700' }}">Formations</a>
      </li>
        <li x-data="{ open: false }">
            <!-- Enlace principal de "Videos" -->
            <a
                href="#"
                @click.prevent="open = !open"
                :class="open ? 'text-white' : 'text-gray-700/75 dark:text-white'"
                class="hover:text-gray-700/75 transition-colors duration-200"
            >
                Videos
            </a>

            <!-- Submenú -->
            <ul
                x-show="open"
                x-cloak
                @click.outside="open = false"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="absolute mt-2 bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 md:mt-0 md:shadow-none md:bg-csfl md:dark:bg-transparent z-10"
            >
                @foreach($this->submenus as $submenu)
                    <li class="text-xl">
                        <a
                            wire:navigate
                            href="{{ route('ressources.slug',[ 'slug' => $submenu->slug]) }}"
                            class="block py-2 px-4 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        >
                            {{ $submenu->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li>
            <a wire:navigate href="/ressources/mots-croises"
               class="{{ request()->is('ressources/mots-croises') ? 'text-white' : 'text-black hover:text-gray-700' }}">
                Mots croisés
            </a>
        </li>
      <li>
        <a wire:navigate href="{{ route('boutique.index') }}" class="{{ request()->routeIs('boutique.index')? 'text-white' : 'text-black hover:text-gray-700' }}">Boutique</a>
      </li>
      <li>
        <a wire:navigate href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-white' : 'text-black hover:text-gray-700' }}">Contact</a>
      </li>
      <li>

          <div class="relative">
              <button  @click="window.dispatchEvent(new CustomEvent('open-slide-over'))">
                  <!-- Heroicon: Shopping Cart -->
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 dark:text-white">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                  </svg>

                  <!-- Badge del contador -->
                  <span
                      x-text="$store.cart.count"
                      x-show="$store.cart.count > 0"
                      class="absolute -top-2 -right-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full">
                  </span>
              </button>
          </div>

      </li>
    </ul>
  </div>
  @push('scripts')
      <script>
          document.addEventListener('alpine:init', () => {
              Alpine.store('cart', {
                  items: JSON.parse(localStorage.getItem('cart')) || [],
                  get count() {
                      return this.items.reduce((sum, item) => sum + item.quantity, 0);
                  },
                  add(product) {
                      const existing = this.items.find(p => p.id === product.id);
                      if (existing) {
                          existing.quantity += product.quantity;
                      } else {
                          this.items.push(product);
                      }
                      this.save();
                  },
                  save() {
                      localStorage.setItem('cart', JSON.stringify(this.items));
                      window.dispatchEvent(new CustomEvent('cart-updated'));
                  }
              });
          });
      </script>
    @endpush

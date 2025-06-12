
@props(['logo' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title . ' - ' .  config('app.name', 'Laravel') ?? config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
{{--    <link href="https://fonts.bunny.net/css?family=alata:400,500&display=swap" rel="stylesheet" />--}}
    <link href="https://fonts.bunny.net/css?family=assistant:200,300,400,500,600,700,800" rel="stylesheet" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ccc950231e.js" crossorigin="anonymous"></script>
    <script>
        const html = document.documentElement;
        const theme = localStorage.getItem('color-theme');

        if (theme === 'dark') {
            html.classList.add('dark');
            html.classList.remove('light');
        } else {
            html.classList.add('light');
            html.classList.remove('dark');
        }

        document.addEventListener('alpine:init', () => {
            Alpine.store('cart', {
                count: 0,
                items: []
            });

            // Puedes sincronizarlo con localStorage si ya guardás el carrito ahí
            const storedItems = JSON.parse(localStorage.getItem('cart')) || [];
            Alpine.store('cart').items = storedItems;
            Alpine.store('cart').count = storedItems.length;
        });

        window.addEventListener('cart-updated', () => {
            const updated = JSON.parse(localStorage.getItem('cart')) || [];

            Alpine.store('cart').items = updated;
            Alpine.store('cart').count = updated.length;
        });


    </script>



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('css')

</head>

<body
    x-data="{
        open: false,
        isOpen: false,
        ...cart()
    }"
    :class="{ 'overflow-hidden': open || isOpen }"
    @add-to-cart.window="addToCart($event.detail.id, $event.detail.quantity, $event.detail.choix)"
    class="sm:overflow-auto dark:bg-slate-900"
>

     @include('layouts.includes.navegation', ['logo' => $logo])
     @include('layouts.includes.sidebar')
     @include('components.slide-over')





    <div
        class="border-gray-200 border-dashed rounded-lg dark:border-gray-70 mt-14">
        {{ $slot }}
    </div>


    <div x-cloak x-on:click="open = false" x-show="open"
        class="bg-gray-900 bg-opacity-50 fixed inset-0 z-30 sm:hidden"></div>


       @include('layouts.includes.footer', ['logo' => $logo ])


       @stack('modals')

        @stack('scripts')
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

         <script>
             function cart() {
                 return {
                     items: [],
                     total: 0,
                     isOpen: false,
                     selectedProductId: null,
                     productDetails: null,
                     notification: '',

                     init() {
                         const saved = localStorage.getItem('cart');
                         const total = localStorage.getItem('cart-total');
                         if (saved) this.items = JSON.parse(saved);
                         if (total) this.total = parseFloat(total);
                         this.items.forEach(i => i.totalPrice = i.price * i.quantity);

                         window.addEventListener('open-slide-over', async (e) => {
                             this.isOpen = true;
                             this.selectedProductId = e.detail?.id ?? null;
                             if (this.selectedProductId) await this.loadProductDetails(this.selectedProductId);
                         });
                     },

                     async loadProductDetails(id) {
                         const res = await fetch(`/api/product/${id}`);
                         const data = await res.json();
                         this.productDetails = data;
                     },

                     async addToCart(productId, quantity = 1) {
                         const existing = this.items.find(i => i.id === productId);
                         if (existing) {
                             existing.quantity += quantity;
                         } else {
                             const res = await fetch(`/api/product/${productId}`);
                             const data = await res.json();
                             this.items.push({
                                 id: data.id,
                                 name: data.name,
                                 slug: data.slug,
                                 price: parseFloat(data.price),
                                 image: data.images?.[0]?.image_path ? `/storage/${data.images[0].image_path}` : '/img/default.jpg',
                                 quantity,
                                 totalPrice: data.price * quantity,
                             });
                         }
                         this.updateTotal();
                         this.isOpen = true;
                         this.showNotification('Produit ajouté au panier');
                     },

                     updateTotal() {
                         this.total = this.items.reduce((sum, i) => sum + i.price * i.quantity, 0);
                         this.items.forEach(i => i.totalPrice = i.price * i.quantity);
                         localStorage.setItem('cart', JSON.stringify(this.items));
                         localStorage.setItem('cart-total', this.total.toFixed(2));
                         window.dispatchEvent(new CustomEvent('cart-updated'));
                     },

                     showNotification(msg) {
                         this.notification = msg;
                         setTimeout(() => this.notification = '', 3000);
                     },

                     clearCart() {
                         this.items = [];
                         this.total = 0;
                         localStorage.removeItem('cart');
                         localStorage.removeItem('cart-total');
                         window.dispatchEvent(new CustomEvent('cart-updated'));
                         setTimeout(() => this.isOpen = false, 3000);
                     },
                 };
             }
         </script>
     @endpush
        @livewireScripts
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>

     <x-top/>
</body>

</html>

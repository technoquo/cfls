<!-- Slide-Over Component -->
<div
     x-show="isOpen"
     x-data="cart()"
     x-init="init()"
     @add-to-cart.window="addToCart($event.detail.id, $event.detail.quantity)"  x-transition

    class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-cloak>
    <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true" ></div>

    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <div class="pointer-events-auto w-screen max-w-md">
                    <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Mon Panier</h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button @click="isOpen = false" type="button"
                                        class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">Fermer</span>
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Cart Items -->
                            <div class="mt-8">
                                <div class="flow-root">
                                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                                        <template x-for="item in items" :key="item.id">
                                            <li class="flex py-6">
                                                <!-- Product image -->
                                                <div class="size-24 shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                    <img :src="item.image" alt="Product image" class="size-full object-cover">
                                                </div>

                                                <!-- Product details -->
                                                <div class="ml-4 flex flex-1 flex-col">
                                                    <!-- Name and price in a row -->
                                                    <a :href="'{{ url('boutique') }}/' + item.slug" x-text="item.name"
                                                       class="text-blue-500 hover:underline"></a>
                                                    <div class="flex justify-between items-center text-base font-medium text-gray-900">

                                                        <span x-text="item.totalPrice.toFixed(2) + ' €'"></span>
                                                    </div>

                                                    <!-- Quantity Controls -->
                                                    <div class="mt-2 flex items-center gap-2">
                                                        <button @click="decreaseQuantity(item.id)" class="px-2 py-1 text-white bg-red-500 rounded">-</button>
                                                        <span x-text="item.quantity"></span>
                                                        <button @click="increaseQuantity(item.id)" class="px-2 py-1 text-white bg-green-500 rounded">+</button>
                                                    </div>
                                                </div>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Cart Total and Checkout -->
                        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p>Sous-total</p>
                                <p x-text="total.toFixed(2) + ' €'"></p>
                            </div>

                            <!-- Add Clear Cart Button -->
                            <div class="mt-4">
                                <button
                                    @click="clearCart()"
                                    class="w-full text-red-600 hover:text-red-800 font-medium text-sm underline"
                                >
                                    Vider le panier
                                    </button>
                            </div>
                            <div class="mt-6">
                                <form id="checkout-form" method="POST" action="{{ route('boutique.checkout') }}">
                                    @csrf
                                    <input type="hidden" name="cart_data" x-model="JSON.stringify(items)">
                                </form>
                                <button
                                    @click="$nextTick(() => { document.getElementById('checkout-form').submit() })"
                                    class="flex items-center justify-center w-full rounded-md bg-csfl px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700"
                                >
                                    Voir le panier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function cart() {
        return {
            items: [],
            total: 0,

            init() {
                const savedItems = localStorage.getItem('cart-items');
                const savedTotal = localStorage.getItem('cart-total');

                if (savedItems) {
                    this.items = JSON.parse(savedItems);
                }

                if (savedTotal) {
                    this.total = parseFloat(savedTotal);
                }

                // Recalculate totalPrice for each item (in case it's missing)
                this.items.forEach(item => {
                    item.totalPrice = item.price * item.quantity;
                });
            },

            async addToCart(productId, quantity = 1) {
                const existing = this.items.find(item => item.id === productId);

                if (existing) {
                    // ✅ Sumar la nueva cantidad a la existente
                    existing.quantity += quantity;
                } else {
                    const response = await fetch(`/api/product/${productId}`);
                    const data = await response.json();

                    const product = {
                        id: data.id,
                        name: data.name,
                        slug: data.slug,
                        price: parseFloat(data.price),
                        image: data.images.length
                            ? `/storage/${data.images[0].image_path}`
                            : '/img/default.jpg',
                        quantity: quantity
                    };

                    this.items.push(product);
                }

                this.updateTotal();
            },

            updateTotal() {
                this.total = this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                this.items.forEach(item => {
                    item.totalPrice = item.price * item.quantity;
                });

                localStorage.setItem('cart-items', JSON.stringify(this.items));
                localStorage.setItem('cart-total', this.total.toFixed(2));
            },

            increaseQuantity(id) {
                const item = this.items.find(i => i.id === id);
                if (item) {
                    item.quantity++;
                    this.updateTotal();
                }
            },

            decreaseQuantity(id) {
                const item = this.items.find(i => i.id === id);
                if (item && item.quantity > 1) {
                    item.quantity--;
                } else {
                    this.items = this.items.filter(i => i.id !== id);
                }
                this.updateTotal();
            },

            clearCart() {
                this.items = [];
                this.total = 0;
                localStorage.removeItem('cart-items');
                localStorage.removeItem('cart-total');
            }
        };
    }
</script>
@endpush

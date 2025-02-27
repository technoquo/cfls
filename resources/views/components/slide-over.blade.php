<!-- Slide-Over Component -->
<div x-show="isOpen" x-data="cart()" @add-to-cart.window="addToCart($event.detail.id)" x-transition
    class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-cloak>
    <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

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
                                                <div
                                                    class="size-24 shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                    <img :src="item.image" alt="Product image"
                                                        class="size-full object-cover">
                                                </div>
                                                <div class="ml-4 flex flex-1 flex-col">
                                                    <div
                                                        class="flex justify-between text-base font-medium text-gray-900">
                                                        <h3>
                                                            <a href="#" x-text="item.name"></a>
                                                        </h3>
                                                        <p class="ml-4" x-text="item.totalPrice.toFixed(2) + ' €'"></p>
                                                    </div>

                                                    <!-- Quantity Controls -->
                                                    <div class="mt-2 flex items-center gap-2">
                                                        <button @click="decreaseQuantity(item.id)"
                                                            class="px-2 py-1 text-white bg-red-500 rounded">
                                                            -
                                                        </button>
                                                        <span x-text="item.quantity"></span>
                                                        <button @click="increaseQuantity(item.id)"
                                                            class="px-2 py-1 text-white bg-green-500 rounded">
                                                            +
                                                        </button>
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
                            <div class="mt-6">
                                <a href="{{ route('boutique.checkout') }}"
                                    class="flex items-center justify-center rounded-md border border-transparent bg-csfl px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">
                                    Voir le panier
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function cart() {
        return {
            items: [],
            total: 0,

            addToCart(productId) {

                const productExists = this.items.find(item => item.id === productId);

                if (productExists) {
                    productExists.quantity++;
                } else {
                    // Simulación de datos del producto (deberías obtenerlos de una API real)
                    const product = {
                        id: productId,
                        name: "Syllabus UE 1",
                        price: 30.00,
                        image: "{{ asset('img/unites/COUV_SYLLABUS_UE1.jpg') }}",
                        quantity: 1
                    };


                    this.items.push(product);
                }

                this.updateTotal();
            },

            increaseQuantity(productId) {
                const product = this.items.find(item => item.id === productId);
                if (product) {

                    product.quantity++;

                    // console.log(product.price*product.quantity);
                    this.updateTotal();
                }
            },

            decreaseQuantity(productId) {
                const product = this.items.find(item => item.id === productId);
                if (product && product.quantity > 1) {
                    product.quantity--;
                } else {
                    this.items = this.items.filter(item => item.id !== productId);
                }
                this.updateTotal();
            },

            updateTotal() {
                this.total = this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);

                // Asegurar que cada item tenga un total calculado
                this.items.forEach(item => {
                    item.totalPrice = item.price * item.quantity;
                });
            }
        }
    }
</script>

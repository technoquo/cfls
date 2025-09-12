<!-- Slide-Over Component -->
<div
    x-show="isOpen"
    @keydown.escape.window="isOpen = false"
    x-transition
    class="relative z-10 "
    aria-labelledby="slide-over-title"
    role="dialog"
    aria-modal="true"
    x-cloak
    >
    <div
        x-show="notification"
        x-cloak
        x-transition
        class="fixed top-4 right-4 z-50 bg-green-100 text-green-800 px-4 py-2 rounded shadow flex items-center space-x-2"
    >
        <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
        </svg>
        <span x-text="notification"></span>
    </div>
    <div class="fixed inset-0 bg-gray-500/75 transition-opacity"></div>


    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 dark:bg-gray-900">
                <div
                    class="pointer-events-auto w-screen max-w-md transform transition ease-in-out duration-300"
                    x-transition:enter="translate-x-full"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="translate-x-full"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full"
                    @click.away="isOpen = false"
                    >
                    <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl dark:bg-gray-800">
                        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900 dark:text-white" id="slide-over-title">Mon Panier</h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button @click="isOpen = false" type="button"
                                            class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">Fermer</span>
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                             stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Cart Items -->
                            <div class="mt-8">
                                <div class="flow-root">
                                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                                        <template x-for="item in items" :key="item.id + '-' + (item.choix ?? '')">
                                            <li class="flex py-6">
                                                <!-- Product image -->
                                                <div
                                                    class="size-24 shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                    <a :href="'{{ url('boutique') }}/' + item.slug">
                                                      <img :src="item.image" alt="Product image" class="size-full object-cover">
                                                    </a>
                                                  </div>

                                                <!-- Product details -->
                                                <div class="ml-4 flex flex-1 flex-col">
                                                    <!-- Name and price in a row -->
                                                    <a :href="'{{ url('boutique') }}/' + item.slug" x-text="item.name"
                                                       class="text-blue-500 hover:underline dark:text-white"></a>
                                                    <div
                                                        class="flex justify-between items-center mt-2"
                                                    >
                                                        <p
                                                            x-show="item.choix && item.choix !== '0'"
                                                            class="text-sm text-gray-500 dark:text-gray-300"
                                                            x-text="'Choix: ' + item.choix">
                                                        </p>
                                                    </div>

                                                    <div
                                                        class="flex justify-between items-center text-base font-medium text-gray-900 dark:text-white">

                                                        <span x-text="item.totalPrice.toFixed(2) + ' €'"></span>
                                                    </div>

                                                    <!-- Quantity Controls -->
                                                    <div class="mt-2 flex items-center gap-2">
                                                        <button @click="decreaseQuantity(item.id)"
                                                                class="px-2 py-1 text-white bg-red-500 rounded">-
                                                        </button>
                                                        <span x-text="item.quantity"></span>
                                                        <button @click="increaseQuantity(item.id)"
                                                                class="px-2 py-1 text-white bg-green-500 rounded">+
                                                        </button>
                                                    </div>

                                                </div>
                                                <!-- Remove button -->
                                                <button @click="removeItem(item.id)"
                                                        class="ml-4 text-gray-400 hover:text-red-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                                    </svg>

                                                    <span class="sr-only">Supprimer</span>
                                                </button>

                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Cart Total and Checkout -->
                        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900 dark:text-white">
                                <p>Sous-total</p>
                                <p x-text="total.toFixed(2) + ' €'"></p>
                            </div>

                            <!-- Add Clear Cart Button -->
                            <div class="mt-4">
                                <button
                                    @click="clearCart()"
                                    class="w-full text-red-600 hover:text-red-800 font-medium text-sm underline "
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
                                    x-text="items.length > 0 ? 'Voir le panier' : 'Votre panier est vide'"
                                    @click="$nextTick(() => { document.getElementById('checkout-form').submit() })"
                                    :disabled="items.length === 0"
                                    :class="items.length === 0
                                    ? 'bg-gray-400 cursor-not-allowed'
                                    : 'bg-csfl hover:bg-indigo-700'"
                                    class="flex items-center justify-center w-full rounded-md px-6 py-3 text-base font-medium text-white shadow-sm transition"
                                >
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
                recentlyAdded: {}, // 🧠 prevent rapid duplicate adds
                total: 0,
                notification: '',


                init() {


                    const savedItems = localStorage.getItem('cart');
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

                addToCart(productId, quantity = 1, choix = null) {

                    // Fetch full product data and add to cart
                    fetch(`/api/product/${productId}`)
                        .then(res => res.json())
                        .then(data => {
                         //  console.log("📦 Producto recibido:", data);

                            // 👉 Verificar si existen opciones
                            // if (Array.isArray(data.options) && data.options.length > 0) {
                            //     console.log("✅ Este producto tiene opciones:", data.options);
                            // } else {
                            //     console.log("⚠️ Este producto no tiene opciones");
                            // }

                            const existingItem = this.items.find(
                                item => item.id === data.id && JSON.stringify(item.choix) === JSON.stringify(choix)
                            );

                            if (existingItem) {
                                existingItem.quantity += quantity;
                                existingItem.totalPrice = existingItem.price * existingItem.quantity;
                                this.updateTotal();
                                this.showNotification('Quantité mise à jour');
                                this.isOpen = true;
                            } else {
                                // 👉 Buscar el peso de la opción seleccionada (si choix coincide con option_name)
                                let optionWeight = null;
                                if (Array.isArray(data.options)) {
                                    const selectedOption = data.options.find(opt => opt.option_name === choix);
                                    if (selectedOption) {
                                        optionWeight = selectedOption.total_weight;
                                    }
                                }

                                console.log('weight' + data.weight);
                                console.log('optionWeight' + optionWeight);
                                const newItem = {
                                    id: data.id,
                                    name: data.name,
                                    slug: data.slug,
                                    price: parseFloat(data.price),
                                    quantity: quantity,
                                    choix: choix,
                                    weight: data.weight ?? optionWeight, // usa el peso de la opción si existe
                                    totalPrice: parseFloat(data.price) * quantity,
                                    image: data.images?.[0]
                                        ? `/storage/${data.images[0].image_path}`
                                        : '/img/default.jpg'
                                };

                               // console.log("🛒 Nuevo item al carrito:", newItem);
                                this.items.push(newItem);
                                this.updateTotal();
                                this.showNotification('Produit ajouté au panier');
                                this.isOpen = true;
                            }

                            setTimeout(() => {
                                this.isOpen = false;
                            }, 5000);
                        })
                        .catch(error => {
                            console.error('Erreur:', error);
                            this.showNotification('Erreur lors de l’ajout.');
                        });

                },

                updateTotal() {

                    this.total = this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                    this.items.forEach(item => {
                        item.totalPrice = item.price * item.quantity;
                    });



                    localStorage.setItem('cart', JSON.stringify(this.items));
                    localStorage.setItem('cart-total', this.total.toFixed(2));
                    window.dispatchEvent(new CustomEvent('cart-updated'));
                },

                increaseQuantity(id) {
                   // console.log('Increasing quantity for item with ID:', id);
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



                    if (this.items.length === 0) {
                        this.showNotification('Produit supprimé');
                        // Esperar 5 segundos antes de cerrar el slide-over si ya no hay productos
                        setTimeout(() => {

                            this.isOpen = false;
                        }, 1000);
                    }
                },

                clearCart() {
                    this.items = [];
                    this.total = 0;
                    localStorage.removeItem('cart');
                    localStorage.removeItem('cart-total');
                    this.showNotification('Produits supprimés');
                    window.dispatchEvent(new CustomEvent('cart-updated'));

                    setTimeout(() => {
                        this.isOpen = false;
                    }, 3000);
                },
                showNotification(message) {
                    this.notification = message;

                    this.$nextTick(() => {
                        setTimeout(() => {
                            this.notification = '';
                        }, 3000); // Mostrar por 3 segundos completos
                    });
                },
                removeItem(id) {

                    if (this.items.length === 1 && this.items[0].id === id) {
                        // Si solo queda ese producto → limpiar todo
                        this.clearCart();
                        setTimeout(() => {
                            this.isOpen = false;
                        }, 3000);
                    } else {

                        // Si hay más de un producto, eliminar solo uno
                        this.items = this.items.filter(i => i.id !== id);
                        this.updateTotal();
                        this.showNotification('Produit supprimé');
                    }
                }

            };
        }
    </script>
@endpush

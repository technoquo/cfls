<x-layout>
    <x-slot name="title">Paiement</x-slot>

    <div x-data="checkout()" class="container mx-auto px-4 py-8">
        <div
            x-show="notification"
            x-cloak
            x-transition
            :class="notificationType === 'error'
        ? 'bg-red-100 text-red-800'
        : 'bg-green-100 text-green-800'"
            class="fixed top-4 right-4 z-50 px-4 py-2 rounded shadow flex items-center space-x-2">
            <span x-text="notification"></span>
        </div>

        <div class="max-w-4xl mx-auto space-y-8">
            <!-- Información Personal -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-semibold mb-4 dark:text-white">Informations Personnelles</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Prénom</label>
                        <input type="text" placeholder="Prénom" name="first_name"
                               class="p-2 border rounded w-full dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Nom</label>
                        <input type="text" placeholder="Nom" name="second_name"
                               class="p-2 border rounded w-full dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Adresse E-mail</label>
                        <input type="email" placeholder="Adresse E-mail"
                               class="p-2 border rounded w-full dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Téléphone</label>
                        <input type="tel" placeholder="Téléphone" name="telephone"
                               class="p-2 border rounded w-full dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                </div>
            </div>

            <!-- Opciones de Entrega -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-semibold mb-4 dark:text-white">Mode de Livraison</h2>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <input type="radio"
                               x-model="delivery"
                               value="retrait"
                               id="pickup"
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="pickup" class="text-lg font-medium text-gray-700 dark:text-white cursor-pointer">
                            Retrait sur place (Gratuit)
                        </label>
                    </div>
                    <div class="flex items-center space-x-3">
                        <input type="radio"
                               x-model="delivery"
                               value="livraison"
                               id="delivery"
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="delivery" class="text-lg font-medium text-gray-700 dark:text-white cursor-pointer">
                            Livraison à domicile
                            <span class="text-sm text-gray-500 dark:text-gray-400" x-show="delivery === 'livraison'">
                                (+<span x-text="deliveryFee.toFixed(2)"></span> €)
                            </span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Formulaire de livraison (visible seulement si livraison standard) -->
            <div x-show="delivery === 'livraison'"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-semibold mb-4 dark:text-white">Informations de livraison</h2>

                <div class="space-y-4">
                    <div>
                        <label for="rue" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Rue et numéro</label>
                        <input id="rue" type="text" placeholder="Rue et numéro"
                               class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="ville" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Ville</label>
                            <input id="ville" type="text" placeholder="Ville"
                                   class="p-2 border rounded w-full dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>
                        <div>
                            <label for="codepostal" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Code Postal</label>
                            <input id="codepostal" type="text" placeholder="Code Postal"
                                   class="p-2 border rounded w-full dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>
                    </div>

                    <div>
                        <label for="region" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Région</label>
                        <select id="region" x-model="region" @change="mettreAJourProvinces()"
                                class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <option value="">Sélectionnez une région</option>
                            <template x-for="r in regionsDisponibles" :key="r.code">
                                <option :value="r.code" x-text="r.nom"></option>
                            </template>
                        </select>
                    </div>

                    <div x-show="provinces.length">
                        <label for="province" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Province</label>
                        <select id="province" x-model="province"
                                class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <option value="">Sélectionnez une province</option>
                            <template x-for="p in provinces" :key="p">
                                <option x-text="p"></option>
                            </template>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Productos -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mb-7">
                <h2 class="text-3xl font-semibold mb-4 dark:text-white">Vos Produits</h2>
                <div class="space-y-4">
                    @foreach ($cart as $product)
                        <div class="flex justify-between items-center border-b pb-4 dark:border-gray-600">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset($product['image']) }}" alt="Produit" class="w-24 h-auto rounded">
                                <div>
                                    <h3 class="font-medium dark:text-white">{{ $product['name'] }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Quantité
                                        : {{ $product['quantity'] }}</p>
                                </div>
                            </div>
                            @if($product['choix'] > 0)
                                <div>
                                    <span class="text-sm text-gray-500 dark:text-gray-400 font-semibold">3 affiches au choix: {{$product['choix']}}</span>
                                </div>
                            @endif

                            <p class="text-lg font-semibold dark:text-white">{{ number_format($product['totalPrice'], 2) }}
                                €</p>
                        </div>
                    @endforeach

                    <!-- Resumen de precios -->
                    <div class="mt-4 pt-4 border-t dark:border-gray-600">
                        <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mb-2">
                            <span>Subtotal :</span>
                            <span x-text="`${baseTotal.toFixed(2)} €`"></span>
                        </div>

                        <template x-if="delivery === 'livraison'">
                            <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mb-2">
                                <span>Frais de livraison :</span>
                                <span x-text="`+${deliveryFee.toFixed(2)} €`"></span>
                            </div>
                        </template>

                        <template x-if="delivery === 'recoger'">
                            <div class="flex justify-between text-sm text-green-600 dark:text-green-400 mb-2">
                                <span>Retrait en magasin :</span>
                                <span>Gratuit</span>
                            </div>
                        </template>

                        <div class="flex justify-between items-center text-xl font-bold">
                            <span class="dark:text-white">Total :</span>
                            <span class="dark:text-white" x-text="finalTotal.toFixed(2) + ' €'"></span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-4 mt-5">
                    <button
                        @click.prevent="confirmerAchat"
                        class="w-full md:w-1/2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                        Confirmer l'Achat
                    </button>

                    <button
                        @click="annulerAchat"
                        class="w-full md:w-1/2 bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                        Annuler
                    </button>
                </div>
            </div>
        </div>

    </div>
    @push('scripts')
        <script>
            function checkout() {
                return {
                    notification: '',
                    notificationType: 'success',
                    delivery: 'retrait', // Valor por defecto
                    baseTotal: {{ collect($cart)->sum('totalPrice') }},
                    totalWeight: {{ collect($cart)->sum('weight') }}, // peso en kilogramos o gramos

                    get deliveryFee() {
                        if (this.delivery === 'retrait') return 0; // Sin costo para recoger

                        const weight = this.totalWeight; // en gramos, por ejemplo

                        if (weight <= 100) return 3.00;
                        if (weight <= 350) return 4.50;
                        if (weight <= 500) return 7.60;
                        if (weight <= 1000) return 7.60;
                        if (weight <= 1800) return 7.90;
                        if (weight <= 10000) return 10.70;
                        if (weight <= 30000) return 18.60;

                        return 0; // fuera de rango o entrega especial
                    },

                    get finalTotal() {
                        return this.baseTotal + this.deliveryFee;
                    },

                    region: '',
                    province: '',
                    regionsDisponibles: [
                        {
                            nom: "Bruxelles-Capitale",
                            code: "bruxelles",
                            provinces: ["Bruxelles"]
                        },
                        {
                            nom: "Flandre",
                            code: "flandre",
                            provinces: ["Anvers", "Limbourg", "Flandre orientale", "Flandre occidentale", "Brabant flamand"]
                        },
                        {
                            nom: "Wallonie",
                            code: "wallonie",
                            provinces: ["Brabant Wallon", "Hainaut", "Liège", "Luxembourg", "Namur"]
                        }
                    ],
                    provinces: [],

                    mettreAJourProvinces() {
                        const regionChoisie = this.regionsDisponibles.find(r => r.code === this.region);
                        this.provinces = regionChoisie ? regionChoisie.provinces : [];
                        this.province = '';
                    },

                    async confirmerAchat() {
                        try {
                            // Validations basiques
                            const first_name = document.querySelector('input[name="first_name"]').value.trim();
                            const second_name = document.querySelector('input[name="second_name"]').value.trim();
                            const email = document.querySelector('input[placeholder="Adresse E-mail"]').value.trim();
                            const telephone = document.querySelector('input[name="telephone"]').value.trim();

                            if (!first_name || !second_name || !email || !telephone ) {
                                this.showNotification("Veuillez remplir tous les champs personnels.", 'error');
                                return;
                            }

                            // Validation email
                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!emailRegex.test(email)) {
                                this.showNotification("Veuillez entrer une adresse email valide.", 'error');
                                return;
                            }

                            if (this.delivery === 'livraison') {
                                const rue = document.getElementById('rue').value.trim();
                                const ville = document.getElementById('ville').value.trim();
                                const codepostal = document.getElementById('codepostal').value.trim();

                                if (!rue || !ville || !codepostal) {
                                    this.showNotification("Veuillez remplir les informations de livraison.", 'error');
                                    return;
                                }

                                if (!this.region || !this.province) {
                                    this.showNotification("Veuillez sélectionner la région et la province.", 'error');
                                    return;
                                }
                            }

                            // Preparar los productos con el formato correcto
                            const products = @json($cart).map(product => ({
                                ...product,
                                choix: product.choix || 0 // Asegurar que choix sea un número
                            }));



                            // Préparer les données
                            const orderData = {
                                first_name,
                                second_name,
                                email,
                                telephone,
                                delivery: this.delivery,
                                products: products,
                                total: Number(parseFloat(this.finalTotal).toFixed(2)),
                                deliveryFee: Number(parseFloat(this.deliveryFee).toFixed(2))
                            };

                            // Solo agregar datos de dirección si es entrega
                            if (this.delivery === 'livraison') {
                                orderData.region = this.region;
                                orderData.province = this.province;
                                orderData.adresse = {
                                    rue: document.getElementById('rue').value.trim(),
                                    ville: document.getElementById('ville').value.trim(),
                                    etat: document.getElementById('etat').value.trim(),
                                    codepostal: document.getElementById('codepostal').value.trim()
                                };
                            }

                         //   console.log('Sending order data:', orderData); // Para debug


                            // Envoyer vers le backend
                            const response = await fetch("{{ route('order.store') }}", {
                                method: "POST",
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                },
                                body: JSON.stringify(orderData)
                            });

                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }

                            const data = await response.json();

                            if (data.error) {
                                this.showNotification(data.error, 'error');
                                return;
                            }

                            // Éxito
                            this.showNotification("Commande enregistrée avec succès !");

                            // Limpiar carrito
                            localStorage.removeItem('cart');
                            localStorage.removeItem('cart-total');

                            // Redirección después de un breve delay
                            setTimeout(() => {
                                window.location.href = "{{ route('boutique.index') }}";
                            }, 2000);

                        } catch (error) {
                            console.error('Error:', error);
                            this.showNotification("Une erreur est survenue lors de l'enregistrement de la commande.", 'error');
                        }
                    },

                    annulerAchat() {
                        if (confirm("Voulez-vous vraiment annuler l'achat ? Les produits seront supprimés du panier.")) {
                            fetch("{{ route('cart.clear') }}", {
                                method: "POST",
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json',
                                }
                            }).then(() => {

                                // Réinitialise les données locales
                                this.items = [];
                                this.total = 0;
                                localStorage.removeItem('cart');
                                localStorage.removeItem('cart-total');
                                // Redirection vers la boutique
                                window.location.href = "{{ route('boutique.index') }}";
                            });
                        }
                    },

                    showNotification(message, type = 'success') {
                        this.notification = message;
                        this.notificationType = type;
                        this.$nextTick(() => {
                            setTimeout(() => {
                                this.notification = '';
                            }, 3000);
                        });
                    },
                };
            }
        </script>
    @endpush
</x-layout>

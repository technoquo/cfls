<x-layout>
    <x-slot name="title">Paiement</x-slot>

    <div x-data="checkout()" class="container mx-auto px-4 py-8">


        <div class="max-w-4xl mx-auto space-y-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-semibold mb-4 dark:text-white">Informations Personnelles</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" placeholder="Prénom"
                           class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <input type="text" placeholder="Nom"
                           class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <input type="email" placeholder="Adresse E-mail"
                           class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <input type="tel" placeholder="Téléphone"
                           class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
                <div class="space-y-4 mt-4">
                    <input type="text" placeholder="Nom de la société"
                           class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
            </div>

            <div x-model="delivery" @change="updateDeliveryFee()">
                <!-- Options de livraison -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-3xl font-semibold mb-4 dark:text-white">Informations de livraison</h2>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-2">
                            <input type="radio" id="livraison" value="livraison" name="delivery" x-model="delivery" class="accent-blue-500">
                            <label for="livraison" class="dark:text-white">Livraison standard</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="radio" id="retrait" value="retrait" name="delivery" x-model="delivery" class="accent-blue-500">
                            <label for="retrait" class="dark:text-white">Retrait sur place</label>
                        </div>
                    </div>
                </div>

                <!-- Formulaire visible seulement si livraison standard -->
                <div x-show="delivery === 'livraison'" x-transition
                     class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mt-4">
                    <h2 class="text-3xl font-semibold mb-4 dark:text-white">Informations de livraison</h2>

                    <div class="space-y-4">
                        <input type="text" placeholder="Rue et numéro"
                               class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <input type="text" placeholder="Ville"
                                   class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <input type="text" placeholder="État"
                                   class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <input type="text" placeholder="Code Postal"
                                   class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>

                        <select name="region" id="region"
                                class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <option value="">Sélectionnez une région</option>
                            <option value="bruxelles">Bruxelles-Capitale</option>
                            <option value="flandre">Flandre</option>
                            <option value="wallonie">Wallonie</option>
                        </select>

                        <select name="province" id="province"
                                class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <option value="">Sélectionnez une province</option>
                            <option value="brabant-wallon">Brabant Wallon</option>
                            <option value="hainaut">Hainaut</option>
                            <option value="liège">Liège</option>
                            <option value="luxembourg">Luxembourg</option>
                            <option value="namur">Namur</option>
                        </select>

                        <input type="text" placeholder="Code postal supplémentaire"
                               class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                </div>
                <div x-show="delivery === 'retrait'" x-transition class="bg-white dark:bg-gray-800 p-4 rounded mt-4">
                    <h3 class="text-lg font-semibold dark:text-white">Adresse de retrait</h3>
                    <p class="text-gray-700 dark:text-gray-300">CFLS - Rue de l'Exemple 123, 1000 Bruxelles</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Lun–Ven : 9h–17h</p>
                </div>
            </div>


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
                            <p class="text-lg font-semibold dark:text-white">{{ number_format($product['totalPrice'], 2) }}
                                €</p>
                        </div>
                    @endforeach
                    <div class="mt-4 pt-4 border-t dark:border-gray-600">
                        <template x-if="delivery === 'livraison'">
                            <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mb-2">
                                <span>Frais de livraison :</span>
                                <span>+7,00 €</span>
                            </div>
                        </template>

                        <div class="flex justify-between items-center">
                            <span class="text-xl font-semibold dark:text-white">Total :</span>
                            <span class="text-xl font-bold dark:text-white" x-text="finalTotal.toFixed(2) + ' €'"></span>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mt-5">
                    <h2 class="font-semibold mb-4 dark:text-white text-3xl">Méthode de Paiement</h2>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-2">
                            <input type="radio" name="payment" id="creditCard" checked class="accent-blue-500">
                            <label for="creditCard" class="dark:text-white">Carte de Crédit</label>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="radio" name="payment" id="paypal" class="accent-blue-500">
                            <label for="paypal" class="dark:text-white">PayPal</label>
                        </div>

                        <div id="cardDetails" class="space-y-4 mt-4">
                            <input type="text" placeholder="Numéro de Carte"
                                   class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" placeholder="MM/AA"
                                       class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <input type="text" placeholder="CVV"
                                       class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            </div>
                        </div>
                    </div>
                </div>

                <button
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                    Confirmer l'Achat
                </button>
            </div>
        </div>

    </div>
    @push('scripts')
        <script>

            function checkout() {
                return {
                    delivery: 'livraison',
                    baseTotal: {{ collect($cart)->sum('totalPrice') }},
                    deliveryFee: 7,
                    get finalTotal() {
                        return this.delivery === 'livraison'
                            ? this.baseTotal + this.deliveryFee
                            : this.baseTotal;
                    }
                };
            }

        </script>
    @endpush
</x-layout>


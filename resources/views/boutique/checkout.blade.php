<x-layout>
    <x-slot name="title">Paiement</x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="font-bold mb-8 text-center dark:text-white text-7xl uppercase">Finaliser l'Achat</h1>

        <div class="max-w-4xl mx-auto space-y-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-semibold mb-4 dark:text-white">Informations Personnelles</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" placeholder="Prénom" class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <input type="text" placeholder="Nom" class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <input type="email" placeholder="Adresse E-mail" class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <input type="tel" placeholder="Téléphone" class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-semibold mb-4 dark:text-white">Adresse de Livraison</h2>
                <div class="space-y-4">
                    <input type="text" placeholder="Rue et numéro" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <input type="text" placeholder="Ville" class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        <input type="text" placeholder="État" class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        <input type="text" placeholder="Code Postal" class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-semibold mb-4 dark:text-white">Vos Produits</h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center border-b pb-2 dark:border-gray-600">
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('img/unites/COUV_SYLLABUS_UE1.jpg') }}" alt="Produit" class="w-36 h-auto rounded">
                            <div>
                                <h3 class="font-medium dark:text-white">Produit 1</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Quantité : 1</p>
                            </div>
                        </div>
                        <p class="dark:text-white">99,99 $</p>
                    </div>
                    </div>
                <div class="mt-4 pt-4 border-t dark:border-gray-600">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold dark:text-white text-3xl">Total :</span>
                        <span class="text-xl font-bold dark:text-white">199,98 $</span>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
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
                        <input type="text" placeholder="Numéro de Carte" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" placeholder="MM/AA" class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <input type="text" placeholder="CVV" class="p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>
                    </div>
                </div>
            </div>

            <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                Confirmer l'Achat
            </button>
        </div>
    </div>

    <script>
        // Toggle Mode Sombre/Clair
        const themeToggle = document.getElementById('themeToggle');
        const sunIcon = document.getElementById('sun');
        const moonIcon = document.getElementById('moon');
        const body = document.body;

        // Charger la préférence de thème
        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark');
            sunIcon.classList.add('hidden');
            moonIcon.classList.remove('hidden');
        }

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark');
            sunIcon.classList.toggle('hidden');
            moonIcon.classList.toggle('hidden');

            // Sauvegarder la préférence
            localStorage.setItem('theme', body.classList.contains('dark') ? 'dark' : 'light');
        });

        // Afficher/masquer les détails de la carte
        const creditCard = document.getElementById('creditCard');
        const paypal = document.getElementById('paypal');
        const cardDetails = document.getElementById('cardDetails');

        function toggleCardDetails() {
            cardDetails.style.display = creditCard.checked ? 'block' : 'none';
        }

        creditCard.addEventListener('change', toggleCardDetails);
        paypal.addEventListener('change', toggleCardDetails);
        toggleCardDetails(); // Initialiser
    </script>

</x-layout>
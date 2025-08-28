<x-layout>
    <x-slot name="title">Mes commandes</x-slot>

    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-semibold mb-6 dark:text-white">Mes commandes</h1>

        @if($orders->isEmpty())
            <p class="text-gray-600 ">Vous n'avez pas encore passé de commande.</p>
        @else
            <div class="space-y-6 p-5">
                @foreach($orders as $order)
                    @php
                        $subtotal = $order->products->reduce(fn($carry, $product) =>
                            $carry + ($product->pivot->quantity * $product->pivot->price), 0
                        );

                        // Chequear si al menos un produit de la commande tiene "choix"
                        $hasChoix = $order->products->contains(fn($product) => !empty($product->pivot->choix));
                    @endphp

                    <div class="border rounded-md bg-white p-6 shadow-sm">
                        <!-- Info commande -->
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h2 class="text-lg font-medium text-gray-800">Commande #{{ $order->id }}</h2>
                                <p class="text-sm dark:text-gray-600">
                                    Passée le {{ $order->created_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                            <div class="text-sm text-gray-700">
                                Statut :
                                @if($order->order_status === 'attente')
                                    <span class="text-yellow-600 font-semibold">En attente</span>
                                @elseif($order->order_status === 'complétée')
                                    <span class="text-green-600 font-semibold">Complétée</span>
                                @elseif($order->order_status === 'annulée')
                                    <span class="text-red-600 font-semibold">Annulée</span>
                                @endif
                            </div>
                        </div>

                        <!-- Produits -->
                        <h3 class="text-md font-medium text-gray-800 mb-2">Produits :</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full border border-gray-200 text-sm">
                                <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="px-4 py-2 text-left border">Image</th>
                                    <th class="px-4 py-2 text-left border">Produit</th>
                                    <th class="px-4 py-2 text-center border">Quantité</th>
                                    @if($hasChoix)
                                        <th class="px-4 py-2 text-center border">Choix</th>
                                    @endif
                                    <th class="px-4 py-2 text-right border">Prix unitaire</th>
                                    <th class="px-4 py-2 text-right border">Total</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                @foreach($order->products as $product)
                                    <tr>
                                        <td class="px-4 py-2 border">
                                            <img src="{{ asset('storage/' . $product->images[0]->image_path) }}"
                                                 alt="{{ $product->name }}"
                                                 class="w-16 h-16 object-cover rounded">
                                        </td>
                                        <td class="px-4 py-2 border">{{ $product->name }}</td>
                                        <td class="px-4 py-2 text-center border">{{ $product->pivot->quantity }}</td>

                                        @if($hasChoix)
                                            <td class="px-4 py-2 text-center border">
                                                {{ $product->pivot->choix ?? '-' }}
                                            </td>
                                        @endif

                                        <td class="px-4 py-2 text-right border">{{ number_format($product->pivot->price, 2) }} €</td>
                                        <td class="px-4 py-2 text-right border font-semibold">
                                            {{ number_format($product->pivot->quantity * $product->pivot->price, 2) }} €
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Total -->
                        <div class="text-right font-bold text-gray-900 mt-4">
                            Sous-total : {{ number_format($subtotal, 2) }} €
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>

<x-layout>
    <x-slot name="title">Facture</x-slot>

    <div class="max-w-3xl mx-auto py-10 px-4">
        <!-- Encabezado -->
        <header class="text-center mb-8">
            <h1 class="text-2xl font-semibold">Merci {{ $order->user->name ?? 'Client' }}</h1>
            <p class="text-gray-600">Vous allez recevoir un e-mail de confirmation dans quelques instants.</p>
        </header>

        <!-- Détails de la commande -->
        <section class="border rounded-md bg-white p-6 shadow-sm">
            @php $subtotal = 0; @endphp

                <!-- Liste des produits -->
            <div class="space-y-4">
                @foreach($order->products as $product)
                    @php
                        $lineTotal = $product->pivot->quantity * $product->pivot->price;
                        $subtotal += $lineTotal;
                    @endphp

                    <div class="flex items-start gap-4 border-b pb-4">
                        <div>
                            <img src="{{ asset('storage/' . $product->mainImage->image_path) }}"
                                 alt="{{ $product->name }}"
                                 class="w-24 h-auto rounded" />
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-center mb-1">
                                <h2 class="font-medium text-gray-800">{{ $product->name }}</h2>
                                <span class="text-sm text-gray-600">Qté : {{ $product->pivot->quantity }}</span>
                            </div>
                            @if($product->pivot->choix)
                                   <div  class="text-sm text-gray-700">
                                        Choix : {{ $product->pivot->choix }}
                                    </div>
                            @endif
                            <div class="text-sm text-gray-700">
                                Prix unitaire : {{ number_format($product->pivot->price, 2) }} €
                            </div>
                            <div class="text-sm text-gray-700">
                                Total ligne : {{ number_format($lineTotal, 2) }} €
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Résumé -->
            <div class="mt-6 border-t pt-4 text-sm text-gray-700 space-y-2">

                @php
                    $memberDiscount = $order->user->isMember() ? $order->user->getMemberDiscount() : 0;
                    $discountAmount = ($subtotal * $memberDiscount) / 100;
                    $subtotalAfterDiscount = $subtotal - $discountAmount;
                @endphp

                        <!-- Subtotal original -->
                <div class="flex justify-between">
                    <span>Sous-total produits</span>
                    <span>{{ number_format($subtotal, 2) }} €</span>
                </div>

                @if($order->user->isMember() && $memberDiscount > 0)
                    <!-- Descuento de membresía -->
                    <div class="flex justify-between text-green-600">
                        <span>Réduction membre ({{ number_format($memberDiscount, 2) }}%)</span>
                        <span>-{{ number_format($discountAmount, 2) }} €</span>
                    </div>

                    <!-- Subtotal después del descuento -->
                    <div class="flex justify-between font-semibold">
                        <span>Sous-total après réduction</span>
                        <span>{{ number_format($subtotalAfterDiscount, 2) }} €</span>
                    </div>
                @endif

                <div class="flex justify-between">
                    <span>Mode de livraison</span>
                    <span>
                        {{ $order->delivery === 'livraison' ? 'Livraison' : 'Retrait' }} :
                        {{ number_format($order->delivery_fee, 2) }} €
                    </span>
                </div>

                <div class="flex justify-between font-semibold text-gray-900 border-t pt-2 mt-2">
                    <span>Total</span>
                    <span>{{ number_format($order->total, 2) }} €</span>
                </div>
            </div>
        </section>
    </div>
</x-layout>

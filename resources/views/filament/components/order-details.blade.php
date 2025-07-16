<div class="space-y-4 text-sm">
    <div>
        <strong>Client:</strong> {{ $order->user->name }}<br>
        <strong>Adresse:</strong> {{ $order->user->address }}<br>
        <strong>Province / Région:</strong> {{ $order->user->province }} / {{ $order->user->region }}
    </div>

    <div>
        <strong>Méthode de livraison:</strong> {{ ucfirst($order->delivery) }}<br>
        <strong>Date:</strong> {{ $order->created_at->format('d/m/Y H:i') }}
    </div>

    <div>
        <strong>Produits:</strong>
        <ul class="list-disc list-inside mt-1">
            @foreach($order->productOrders as $po)
                <li>{{ $po->product->name }} ×{{ $po->quantity }}</li>
            @endforeach
        </ul>
        @php
            $choixList = $order->productOrders->filter(fn($po) => !empty($po->choix));
        @endphp

        @if($choixList->isNotEmpty())
            <strong>Choix:</strong>

            <ul class="list-disc list-inside mt-1">
                @foreach($choixList as $po)
                    <li>{{ $po->choix }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div>
        <strong>Total:</strong> € {{ number_format($order->total, 2, ',', ' ') }}
    </div>

    <div>
        <strong>Statut:</strong> {{ ucfirst($order->order_status) }}
    </div>
</div>

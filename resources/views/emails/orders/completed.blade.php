<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande terminée</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8fafc; padding: 20px; color: #111827;">
<div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
    <h1 style="font-size: 24px; margin-bottom: 20px;">Bonjour {{ $order->user->name }},</h1>

    <p style="font-size: 16px; line-height: 1.6;">
        Votre commande <strong>#{{ $order->id }}</strong> est maintenant <strong>complétée</strong> et prête à être expédiée.<br>
        Merci pour votre achat !
    </p>

    <div style="background-color: #eef2ff; padding: 16px; border-radius: 6px; margin: 24px 0;">
        <p style="margin: 0; font-size: 16px;">
            <strong>Total :</strong> €{{ number_format($order->total, 2, ',', ' ') }}<br>
            <strong>Méthode de livraison :</strong> {{ ucfirst($order->delivery) }}<br>
            @if($order->delivery === 'livraison')
                <strong>Adresse de livraison :</strong> {{ $order->user->address }}, {{ $order->user->postal_code }}, {{ $order->user->region }}, {{ $order->user->province }}
            @else
                <strong>Point de retrait :</strong> Avenue du Four à Briques, 3A, 1140 Evere ( Bruxelles)
                Horaires : 9h00 - 17h00 du lundi au vendredi
            @endif
        </p>
    </div>

    @if($order->productOrders->count())
        <h2 style="font-size: 18px; margin-top: 30px;">Produits commandés :</h2>
        <table cellpadding="0" cellspacing="0" style="width: 100%; font-size: 16px; margin-bottom: 20px;">
            @foreach($order->productOrders as $po)
                <tr style="vertical-align: top;">
                    <td style="padding: 8px 0; width: 60px;">
                        @if($po->product?->mainImage?->image_path)
                            <img src="{{ asset('storage/' . $po->product->mainImage->image_path) }}"
                                 alt="{{ $po->product->name }}"
                                 style="width: 80px; height: auto; border-radius: 4px; margin-right: 10px; float: left;" />
                        @else
                            <div style="width: 80px; height: 80px; background: #e5e7eb; border-radius: 6px;"></div>
                        @endif
                    </td>
                    <td style="padding: 8px 12px;">
                        {{ $po->product->name }} ×{{ $po->quantity }}
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    <p style="font-size: 16px; line-height: 1.6;">
        Nous vous contacterons dès que le colis sera expédié.
    </p>

    <p style="font-size: 16px; margin-top: 40px;">
        Merci,<br>
        <strong>L’équipe de {{ config('app.name') }}</strong>
    </p>
</div>
</body>
</html>

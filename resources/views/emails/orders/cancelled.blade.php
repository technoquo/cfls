<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande annulée</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8fafc; padding: 20px; color: #111827;">
<div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; padding: 24px;">
    <h1 style="font-size: 24px;">Bonjour {{ $order->user->name }},</h1>

    <p style="font-size: 16px; line-height: 1.6;">
        Nous sommes désolés de vous informer que votre commande <strong>#{{ $order->id }}</strong> a été <strong>annulée</strong>.
    </p>

    <div style="background-color: #fef2f2; padding: 16px; border-radius: 6px; margin: 24px 0;">
        <p style="margin: 0; font-size: 16px;">
            <strong>Total :</strong> €{{ number_format($order->total, 2, ',', ' ') }}<br>
            <strong>Méthode de livraison :</strong> {{ ucfirst($order->delivery) }}
        </p>
    </div>

    @if($order->productOrders->count())
        <h2 style="font-size: 18px; margin-top: 30px;">Produits dans la commande :</h2>
        <table cellpadding="0" cellspacing="0" style="width: 100%; font-size: 16px; margin-bottom: 20px;">
            @foreach($order->productOrders as $po)
                <tr style="vertical-align: top;">
                    <td style="padding: 8px 0; width: 60px;">
                        @if($po->product->mainImage?->image_path)
                            <img src="{{ asset('storage/' . $po->product->mainImage->image_path) }}"
                                 alt="{{ $po->product->name }}"
                                 style="width: 60px; height: 60px; border-radius: 6px; object-fit: cover;">
                        @else
                            <div style="width: 60px; height: 60px; background: #e5e7eb; border-radius: 6px;"></div>
                        @endif
                    </td>
                    <td style="padding: 8px 12px;">
                        <strong>{{ $po->product->name }}</strong><br>
                        Quantité : {{ $po->quantity }}<br>
                        Prix unitaire : €{{ number_format($po->price, 2, ',', ' ') }}
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    <p style="font-size: 16px;">
        Si vous avez des questions, n’hésitez pas à nous contacter.
    </p>

    <p style="font-size: 16px; margin-top: 40px;">
        Merci,<br>
        <strong>L’équipe de {{ config('app.name') }}</strong>
    </p>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande terminée</title>
    <style>
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; padding: 15px !important; }
            .product-image { width: 60px !important; }
            h1 { font-size: 20px !important; }
            h2 { font-size: 18px !important; }
            .info-box { padding: 12px !important; }
        }
    </style>
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif; background-color: #f4f4f5; margin: 0; padding: 20px;">
<table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto;">
    <tr>
        <td align="center">
            <table width="100%" cellpadding="0" cellspacing="0" class="container" style="background-color: white; border-radius: 8px; padding: 30px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <tr>
                    <td style="text-align: center; padding-bottom: 20px;">
                        <img src="{{asset('img/cfls.png')}}" alt="Company Logo" style="max-width: 150px; height: auto; display: block; margin: 0 auto;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1 style="font-size: 24px; color: #4f46e5; margin: 0 0 15px; line-height: 1.4;">
                            Bonjour {{ $order->user->name }},
                        </h1>
                        <p style="font-size: 16px; color: #333; margin: 0 0 20px; line-height: 1.6;">
                            Votre commande <strong>#{{ $order->id }}</strong> est maintenant <strong>complétée</strong> et prête à être expédiée.<br>
                            Merci pour votre achat ! 🎉
                        </p>

                        <div class="info-box" style="background-color: #eef2ff; padding: 16px; border-radius: 6px; margin: 25px 0; font-size: 14px; color: #374151;">
                            <p style="margin: 0 0 10px;">
                                <strong>Total :</strong> €{{ number_format($order->total, 2, ',', ' ') }}<br>
                                <strong>Méthode de livraison :</strong> {{ ucfirst($order->delivery) }}<br>
                                @if($order->delivery === 'livraison')
                                    <strong>Adresse de livraison :</strong> {{ $order->user->address }}, {{$order->ville}} {{ $order->user->postal_code }}, {{ $order->user->region }}, {{ $order->user->province }}
                                @else
                                    <strong>Point de retrait :</strong> Avenue du Four à Briques, 3A, 1140 Evere (Bruxelles)<br>
                                    <strong>Horaires :</strong> 9h00 - 17h00 du lundi au vendredi
                                @endif
                            </p>
                        </div>

                        @if($order->productOrders->count())
                            <h2 style="font-size: 20px; color: #111827; margin: 25px 0 15px;">
                                📦 Produits commandés
                            </h2>
                            <table cellpadding="0" cellspacing="0" style="width: 100%; font-size: 14px; color: #374151; margin-bottom: 20px;">
                                @foreach($order->productOrders as $po)
                                    <tr style="vertical-align: top;">
                                        <td style="padding: 10px 0; width: 80px;">
                                            @if($po->product?->mainImage?->image_path)
                                                <img src="{{ asset('storage/' . $po->product->mainImage->image_path) }}"
                                                     alt="{{ $po->product->name }}"
                                                     class="product-image"
                                                     style="width: 80px; height: auto; border-radius: 4px; margin-right: 15px;">
                                            @else
                                                <div style="width: 80px; height: 80px; background: #e5e7eb; border-radius: 6px;"></div>
                                            @endif
                                        </td>
                                        <td style="padding: 10px 12px;">
                                            <p style="margin: 0; font-weight: 600;">{{ $po->product->name }} ×{{ $po->quantity }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif

                        <p style="font-size: 16px; color: #333; line-height: 1.6; margin: 0 0 20px;">
                            Nous vous contacterons dès que le colis sera expédié.
                        </p>

                        <hr style="margin: 25px 0; border: none; border-top: 1px solid #e5e7eb;">

                        <p style="font-size: 16px; color: #4f46e5; font-weight: 600; margin: 0; text-align: center;">
                            Merci pour votre confiance,<br>
                            L’équipe de {{ config('app.name') }}
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

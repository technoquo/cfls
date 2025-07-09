<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de commande</title>
</head>
<body style="font-family: sans-serif; background-color: #f4f4f5; padding: 30px;">
<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table width="600" cellpadding="0" cellspacing="0" style="background-color: white; border-radius: 8px; padding: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                <tr>
                    <td>
                        <h1 style="font-size: 24px; color: #4f46e5;">Bonjour {{ $order->user->name }},</h1>
                        <p style="font-size: 16px; color: #333; margin-top: 15px;">
                            Merci pour votre commande ! 🎉<br>
                            Nous avons bien reçu votre paiement et préparons votre commande.
                        </p>

                        <hr style="margin: 30px 0; border: none; border-top: 1px solid #e5e7eb;">

                        <h2 style="font-size: 20px; color: #111827;">🧾 Détails de la commande</h2>
                        <p><strong>Commande n° :</strong> {{ $order->id }}</p>
                        <p><strong>Date :</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Mode de livraison :</strong> {{ ucfirst($order->delivery) }}</p>


                        <hr style="margin: 30px 0; border: none; border-top: 1px solid #e5e7eb;">

                        <h2 style="font-size: 20px; color: #111827;">📦 Produits commandés</h2>
                        @foreach($order->products as $product)
                            <div style="margin-bottom: 15px;">
                                <p>
                                    <img src="{{ asset('storage/' . $product->mainImage->image_path) }}"
                                         alt="{{ $product->name }}"
                                         style="width: 80px; height: auto; border-radius: 4px; margin-right: 10px; float: left;" />
                                </p>
                                <p><strong>{{ $product->name }}</strong></p>
                                <p>Quantité : {{ $product->pivot->quantity }}</p>
                                @isset($product->pivot->choix)
                                    <p><strong>Choix :</strong> {{ $product->pivot->choix }}</p>
                                @endisset
                                <p>Prix unitaire : {{ number_format($product->pivot->price, 2) }} €</p>
                                <p><strong>Sous-total :</strong> {{ number_format($product->pivot->quantity * $product->pivot->price, 2) }} €</p>
                            </div>
                        @endforeach

                        <hr style="margin: 30px 0; border: none; border-top: 1px solid #e5e7eb;">

                        <h2 style="font-size: 20px; color: #111827;">💰 Résumé</h2>
                        <table width="100%" cellpadding="5" cellspacing="0">
                            <tr>
                                <td>Sous-total produits</td>
                                <td align="right">{{ number_format($order->products->sum(fn($p) => $p->pivot->quantity * $p->pivot->price), 2) }} €</td>
                            </tr>
                            <tr>
                                <td>Frais de livraison</td>
                                <td align="right">{{ number_format($order->delivery_fee, 2) }} €</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Total</td>
                                <td align="right" style="font-weight: bold;">{{ number_format($order->total, 2) }} €</td>
                            </tr>
                        </table>

                        <div style="text-align: center; margin: 40px 0;">
                            <a href="{{ route('order.facture', $order->id) }}"
                               style="background-color: #4f46e5; color: white; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-size: 16px; display: inline-block;">
                                Voir ma commande
                            </a>
                        </div>

                        <hr style="margin: 30px 0; border: none; border-top: 1px solid #e5e7eb;">

                        <p style="font-size: 14px; color: #6b7280;">
                            📧 Une copie de cette facture a été envoyée à votre adresse e-mail.<br>
                            Si vous avez des questions, n'hésitez pas à nous contacter.
                        </p>

                        <p style="font-size: 16px; color: #4f46e5; font-weight: bold; margin-top: 20px;">
                            Merci pour votre confiance,<br>
                            {{ config('app.name') }}
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

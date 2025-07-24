<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de réservation</title>
    <style>
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; padding: 15px !important; }
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
                        <h2 style="font-size: 24px; color: #4f46e5; margin: 0 0 15px; line-height: 1.4;">
                            Bonjour {{ $inscription->first_name }},
                        </h2>
                        <p style="font-size: 16px; color: #333; margin: 0 0 20px; line-height: 1.6;">
                            Votre inscription à la table de conversation du
                            <strong>{{ \Carbon\Carbon::parse($inscription->tableconversation->date_start)->format('d/m/Y') }}</strong>
                            de <strong>{{ $inscription->tableconversation->hour_start }}</strong> à
                            <strong>{{ $inscription->tableconversation->hour_end }}</strong>
                            a bien été <strong>confirmée</strong>.
                        </p>

                        <p style="font-size: 16px; color: #333; line-height: 1.6; margin: 25px 0;">
                            Merci pour votre confiance.
                        </p>

                        <div class="info-box" style="background-color: #eef2ff; padding: 16px; border-radius: 6px; margin: 25px 0; font-size: 14px; color: #374151;">
                            <p style="margin: 0 0 10px;">
                                Afin de confirmer votre réservation, veuillez verser le montant sur le compte suivant :<br>
                                <strong>BE38 3100 5385 3072</strong>
                            </p>
                            <p style="margin: 0;">
                                Ensuite, envoyez votre <strong>preuve de paiement</strong> à l’adresse :
                                <a href="mailto:info@cfls.be" style="color: #4f46e5; text-decoration: none;">info@cfls.be</a>.
                            </p>
                        </div>

                        <hr style="margin: 25px 0; border: none; border-top: 1px solid #e5e7eb;">

                        <p style="font-size: 16px; color: #4f46e5; font-weight: 600; margin: 0; text-align: center;">
                            Cordialement,<br>
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

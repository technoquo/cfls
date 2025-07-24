<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'inscription</title>
    <style>
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; padding: 15px !important; }
            h1 { font-size: 20px !important; }
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
                            Merci {{ $inscription->first_name }} pour votre inscription !
                        </h1>
                        <p style="font-size: 16px; color: #333; margin: 0 0 20px; line-height: 1.6;">
                            Votre inscription à <strong>{{ $inscription->formation->title ?? 'la formation' }}</strong> a bien été enregistrée.
                        </p>

                        <hr style="margin: 25px 0; border: none; border-top: 1px solid #e5e7eb;">

                        <table style="width: 100%; font-size: 14px; color: #374151; margin-bottom: 20px;">
                            <tr>
                                <td style="padding: 5px 0;"><strong>Nom :</strong></td>
                                <td style="padding: 5px 0;">{{ $inscription->user->name }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 5px 0;"><strong>Email :</strong></td>
                                <td style="padding: 5px 0;">{{ $inscription->user->email }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 5px 0;"><strong>Téléphone :</strong></td>
                                <td style="padding: 5px 0;">{{ $inscription->user->telephone }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 5px 0;"><strong>Formation :</strong></td>
                                <td style="padding: 5px 0;">{{ str_replace('Formations accélérées', 'Formation accélérée', $formation->title) }} - {{ $calendar->levels->name }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 5px 0;"><strong>Date début :</strong></td>
                                <td style="padding: 5px 0;">{{ \Carbon\Carbon::parse($calendar->start_date)->format('d-m-Y H:i') }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 5px 0;"><strong>Date de fin :</strong></td>
                                <td style="padding: 5px 0;">{{ \Carbon\Carbon::parse($calendar->end_date)->format('d-m-Y H:i') }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 5px 0;"><strong>Horaire :</strong></td>
                                <td style="padding: 5px 0;">{{ $calendar->hour_start }} - {{ $calendar->hour_end }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 5px 0;"><strong>Montant :</strong></td>
                                <td style="padding: 5px 0;">{{ $calendar->price ?? '0' }} €</td>
                            </tr>
                            <tr>
                                <td style="padding: 5px 0;"><strong>Tarif réduit :</strong></td>
                                <td style="padding: 5px 0;">{{ $inscription->reduit_rate ? 'Oui' : 'Non' }}</td>
                            </tr>
                        </table>

                        <p style="font-size: 16px; color: #333; line-height: 1.6; margin: 25px 0;">
                            Nous vous contacterons prochainement avec plus d'informations.
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

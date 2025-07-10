<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation d'inscription</title>
</head>
<body style="font-family: sans-serif; background-color: #f9fafb; padding: 30px;">
<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table width="600" style="background-color: white; border-radius: 8px; padding: 30px;">
                <tr>
                    <td>
                        <h1 style="color: #2563eb;">Merci {{ $inscription->first_name }} pour votre inscription !</h1>
                        <p>Votre inscription à <strong>{{ $inscription->formation->title ?? 'la formation' }}</strong> a bien été enregistrée.</p>

                        <hr style="margin: 20px 0;">

                        <p><strong>Nom :</strong> {{ $inscription->user->name }}</p>
                        <p><strong>Email :</strong> {{ $inscription->user->email }}</p>
                        <p><strong>Téléphone :</strong> {{ $inscription->user->telephone }}</p>
                        <p><strong>Formation :</strong> {{ str_replace('Formations accélérées', 'Formation accélérée', $formation->title) }} - {{$calendar->levels->name}}</p>
                        <p><strong>Date début :</strong> {{ \Carbon\Carbon::parse($calendar->start_date)->format('d-m-Y H:i') }}</p>
                        <p><strong>Date de fin :</strong> {{ \Carbon\Carbon::parse($calendar->end_date)->format('d-m-Y H:i') }}</p>
                        <p><strong>Horaire :</strong>{{ $calendar->hour_start }} - {{ $calendar->hour_end }}</p>
                        <p><strong>Montant :</strong> {{ $calendar->price ?? '0' }} €</p>
                        <p><strong>Tarif réduit:</strong> {{ $inscription->reduit_rate ? 'Oui' : 'Non' }}</p>

                        <p style="margin-top: 30px;">Nous vous contacterons prochainement avec plus d'informations.</p>

                        <p style="color: #4b5563; margin-top: 20px;">Cordialement,<br>Équipe {{ config('app.name') }}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

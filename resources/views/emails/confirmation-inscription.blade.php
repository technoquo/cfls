<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de  {{ str_replace('Formations accélérées', 'Formation accélérée', $inscription->formation->title ) }} - {{$inscription->calendar->levels->name}} </title>
</head>
<body style="font-family: sans-serif; background-color: #f9fafb; padding: 30px;">
<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table width="600" style="background-color: white; border-radius: 8px; padding: 30px;">
                <tr>
                    <td>
                        <h2 style="color: #2563eb;">Bonjour {{ $inscription->user->name }},</h2>

                        <p>Votre inscription à la {{ str_replace('Formations accélérées', 'Formation accélérée', $inscription->formation->title ) }} du
                            <strong>{{ \Carbon\Carbon::parse($inscription->calendar->start_date)->format('d/m/Y') }}</strong>
                            de <strong>{{ $inscription->calendar->hour_start }}</strong> à
                            <strong>{{ $inscription->calendar->hour_end }}</strong>
                            a bien été <strong>confirmée</strong>.
                        </p>

                        <p style="margin-top: 30px;">Merci pour votre confiance.</p>

{{--                        <p style="margin-top: 20px;">--}}
{{--                            Afin de confirmer votre réservation, veuillez verser le montant sur le compte suivant :--}}
{{--                            <br><strong>BE38 3100 5385 3072</strong>--}}
{{--                        </p>--}}

{{--                        <p>--}}
{{--                            Ensuite, envoyez votre <strong>preuve de paiement</strong> à l’adresse :--}}
{{--                            <a href="mailto:info@votresite.com">info@cfls.be</a>.--}}
{{--                        </p>--}}
                        <p style="color: #4b5563; margin-top: 20px;">
                            Cordialement,<br>
                            Équipe {{ config('app.name') }}<br>
                            Avenue du Four à Briques, 3A<br>
                            1140 Evere (Bruxelles)
                        </p>


                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

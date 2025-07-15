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
                        <p>Votre inscription à <strong>{{ $inscription->formation->title ?? 'la table de conversation' }}</strong> a bien été enregistrée.</p>

                        <hr style="margin: 20px 0;">

                        <p><strong>Nom :</strong> {{ $inscription->first_name }}</p>
                        <p><strong>Email :</strong> {{ $inscription->email }}</p>
                        <p><strong>Date :</strong> {{ $inscription->inscription_message }}</p>

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

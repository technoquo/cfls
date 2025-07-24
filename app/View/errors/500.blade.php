<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 500 - Error interno del servidor</title>
    <style>
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; padding: 15px !important; }
            h1 { font-size: 20px !important; }
            .button { padding: 10px 20px !important; font-size: 14px !important; }
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
                        <img src="{{asset('img/cfls.png')}}" alt="Cfls ASBL" style="max-width: 150px; height: auto; display: block; margin: 0 auto;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <h1 style="font-size: 24px; color: #4f46e5; margin: 0 0 15px; line-height: 1.4;">Lo siento, algo salió mal</h1>
                        <p style="font-size: 16px; color: #333; margin: 0 0 20px; line-height: 1.6;">
                            Ha ocurrido un error interno en el servidor. Nuestro equipo ha sido notificado y trabajaremos para resolverlo lo antes posible.
                        </p>
                        <div style="text-align: center; margin: 30px 0;">
                            <a href="{{ url('/') }}" class="button" style="background-color: #4f46e5; color: white; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-size: 16px; display: inline-block; transition: background-color 0.2s;">
                                Volver al inicio
                            </a>
                        </div>
                        <hr style="margin: 25px 0; border: none; border-top: 1px solid #e5e7eb;">
                        <p style="font-size: 16px; color: #4f46e5; font-weight: 600; margin: 0;">
                            Equipo {{ config('app.name') }}
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

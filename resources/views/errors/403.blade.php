{{-- resources/views/errors/403.blade.php --}}
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur 403 - Accès refusé</title>
    @vite('resources/css/app.css') {{-- Asegúrate de tener Tailwind cargado --}}
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans p-4">
<div class="bg-white rounded-lg shadow-md w-full max-w-lg p-8 text-center">
    <img src="{{ asset('img/cfls.png') }}" alt="Cfls ASBL" class="mx-auto mb-6 w-24"> {{-- Logo más pequeño --}}

    <h1 class="text-2xl font-semibold text-indigo-600 mb-4">Accès refusé</h1>

    <p class="text-gray-700 text-base leading-relaxed mb-6">
        Vous n'avez pas la permission d'accéder à cette page.<br>
        Si vous pensez qu'il s'agit d'une erreur, veuillez contacter l'administrateur.
    </p>

    <a href="{{ url('/') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-base font-medium px-6 py-3 rounded-md transition">
        Retour à l'accueil
    </a>

    <hr class="my-6 border-t border-gray-200">

    <p class="text-indigo-600 font-semibold text-base">
        L'équipe de {{ config('app.name') }}
    </p>
</div>
</body>
</html>

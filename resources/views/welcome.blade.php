<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nous construisons notre site web</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased min-h-screen flex items-center justify-center">
<div class="bg-white rounded-lg shadow p-8 max-w-lg w-full text-center">
    <img src="{{ asset('img/logo_cfls.png') }}" alt="Construction" class="mx-auto mb-6">
    <h1 class="text-3xl font-bold mb-4">Nous construisons notre site web !</h1>
    <p class="text-gray-600 mb-6">
        Nous travaillons actuellement d'arrache-pied pour lancer notre site très bientôt.
        Revenez nous voir dans quelques jours pour découvrir toutes les nouveautés que nous préparons.
    </p>
    <p class="text-gray-600 mb-6">
        En attendant, vous pouvez visiter notre site alternatif :
        <a href="https://wix.cfls.be" class="text-blue-500 hover:underline">wix.clfs.be</a>
    </p>
    <footer class="text-sm text-gray-500">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>
</div>
</body>
</html>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="themeToggle()" x-bind:class="theme">
<head>
    <link rel="canonical" href="https://www.cfls.be" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CFLS - Centre Francophone de la Langue des Signes</title>

    <!-- Meta SEO -->
    <meta name="title" content="CFLS - Centre Francophone de la Langue des Signes">
    <meta name="description" content="Le Centre Francophone de la Langue des Signes s'est donné pour mission de diffuser la langue des signes par des cours, des publications et de la recherche en L.S.">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="French">
    <meta name="author" content="CLFS">

    <!-- Social media share -->
    <meta property="og:title" content="CFLS - Centre Francophone de la Langue des Signes">
    <meta property="og:site_name" content="CFLS">
    <meta property="og:url" content="https://www.cfls.be">
    <meta property="og:description" content="Le Centre Francophone de la Langue des Signes s'est donné pour mission de diffuser la langue des signes par des cours, des publications et de la recherche en L.S.">
    <meta property="og:type" content="web">
    <meta property="og:image" content="">
    {{-- <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@themesberg" />
    <meta name="twitter:creator" content="@themesberg" /> --}}

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="">
    <link rel="icon" type="image/png" sizes="32x32" href="">
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body x-data="{ open: false }"
:class="{ 'overflow-hidden': open }"
class="sm:overflow-auto">

    {{ $slot }}

    @stack('scripts')
</body>
</html>
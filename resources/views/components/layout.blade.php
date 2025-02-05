@props(['breadcrumb' => []])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="themeSwitcher()" :class="{ 'dark': theme === 'dark', 'light': theme === 'light' }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=alata:400,500&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ccc950231e.js" crossorigin="anonymous"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')

</head>

<body x-data="{ open: false }" :class="{ 'overflow-hidden': open }" class="sm:overflow-auto dark:bg-slate-900" >

    @include('layouts.includes.navegation')
    @include('layouts.includes.sidebar')






    <div
        class="p-4  border-gray-200 border-dashed rounded-lg dark:border-gray-700  px-4 mx-auto">
        {{ $slot }}
    </div>


    <div x-cloak x-on:click="open = false" x-show="open"
        class="bg-gray-900 bg-opacity-50 fixed inset-0 z-30 sm:hidden"></div>
   
   
       @include('layouts.includes.footer');
   
   
   
        @stack('scripts')



</body>

</html>

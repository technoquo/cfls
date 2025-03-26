
@props(['logo' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <title>{{ $title . ' - ' .  config('app.name', 'Laravel') ?? config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=alata:400,500&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ccc950231e.js" crossorigin="anonymous"></script>

  
    

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('css')

</head>

<body x-data="{ open: false }" :class="{ 'overflow-hidden': open }" class="sm:overflow-auto dark:bg-slate-900" >
   
     @include('layouts.includes.navegation', ['logo' => $logo])
    @include('layouts.includes.sidebar')






    <div
        class="p-4  border-gray-200 border-dashed rounded-lg dark:border-gray-700  px-4 mx-auto">
        {{ $slot }}
    </div>


    <div x-cloak x-on:click="open = false" x-show="open"
        class="bg-gray-900 bg-opacity-50 fixed inset-0 z-30 sm:hidden"></div>
   
   
       @include('layouts.includes.footer', ['logo' => $logo])
   
       @stack('modals')
   
        @stack('scripts')
        @livewireScripts
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>

</body>

</html>

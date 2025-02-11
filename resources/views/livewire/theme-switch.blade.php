<!-- Darkmode Toggler -->
<button x-on:click="darkMode = !darkMode" type="button" class="rounded-full">
    <img x-show="!darkMode" class="w-16 h-16" src="{{ asset('img/clair.png') }}"/>
    <img x-show="darkMode" class="w-16 h-16" src="{{ asset('img/sombre.png') }}"/>
</button>  

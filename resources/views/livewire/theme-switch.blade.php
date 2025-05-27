<!-- Darkmode Toggler -->
<button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 ml-3 bg-white dark:bg-gray-800">
    <img id="theme-toggle-dark-icon" src="{{ asset('img/sombre.png') }}" class="w-16 h-auto" alt="Darkmode Icon" />
    <img id="theme-toggle-light-icon" src="{{ asset('img/clair.png') }}" class="w-16 h-auto hidden" alt="Lightmode Icon" />

</button>
@push('scripts')
<script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
    themeToggleDarkIcon.classList.add('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
    themeToggleLightIcon.classList.add('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function () {
        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        const html = document.documentElement;

        // Si ya hay un valor guardado en localStorage
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                html.classList.add('dark');
                html.classList.remove('light');
                localStorage.setItem('color-theme', 'dark');
            } else {
                html.classList.add('light');
                html.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }
        } else {
            // Si no hay tema guardado, usamos la clase actual
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                html.classList.add('light');
                localStorage.setItem('color-theme', 'light');
            } else {
                html.classList.add('dark');
                html.classList.remove('light');
                localStorage.setItem('color-theme', 'dark');
            }
        }
    });
</script>
@endpush

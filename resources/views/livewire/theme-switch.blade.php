<!-- Darkmode Toggler -->
<button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 ml-3 bg-white dark:bg-gray-800">
    <img id="theme-toggle-icon" src="{{ asset('img/sombre.png') }}" class="w-16 h-auto" alt="Darkmode Icon" width="60" height="60" />
</button>

@push('scripts')
    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleIcon = document.getElementById('theme-toggle-icon');

        // Define paths to your icons
        const darkIconPath = '{{ asset('img/sombre.png') }}';
        const lightIconPath = '{{ asset('img/clair.png') }}';

        // Set initial icon based on stored theme or system preference
        if (localStorage.getItem('color-theme') === 'dark' ||
            (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            themeToggleIcon.src = lightIconPath;
            themeToggleIcon.alt = 'Lightmode Icon';
        } else {
            document.documentElement.classList.remove('dark');
            themeToggleIcon.src = darkIconPath;
            themeToggleIcon.alt = 'Darkmode Icon';
        }

        themeToggleBtn.addEventListener('click', function () {
            const html = document.documentElement;

            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    html.classList.add('dark');
                    html.classList.remove('light');
                    localStorage.setItem('color-theme', 'dark');
                    themeToggleIcon.src = lightIconPath;
                    themeToggleIcon.alt = 'Lightmode Icon';
                } else {
                    html.classList.add('light');
                    html.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                    themeToggleIcon.src = darkIconPath;
                    themeToggleIcon.alt = 'Darkmode Icon';
                }
            } else {
                if (html.classList.contains('dark')) {
                    html.classList.remove('dark');
                    html.classList.add('light');
                    localStorage.setItem('color-theme', 'light');
                    themeToggleIcon.src = darkIconPath;
                    themeToggleIcon.alt = 'Darkmode Icon';
                } else {
                    html.classList.add('dark');
                    html.classList.remove('light');
                    localStorage.setItem('color-theme', 'dark');
                    themeToggleIcon.src = lightIconPath;
                    themeToggleIcon.alt = 'Lightmode Icon';
                }
            }
        });
    </script>
@endpush


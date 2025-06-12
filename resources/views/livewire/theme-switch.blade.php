<!-- Darkmode Toggler -->
<div x-data="themeSwitch" class="relative z-50">
    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 ml-3 bg-white dark:bg-gray-800 z-1">
        <img id="theme-toggle-icon" src="{{ asset('img/sombre.png') }}" class="w-16 h-auto" alt="Darkmode Icon" width="60" height="60" />
    </button>
</div>

@push('scripts')
    <script>
        function initThemeToggle() {
            const themeToggleBtn = document.getElementById('theme-toggle');
            const themeToggleIcon = document.getElementById('theme-toggle-icon');

            if (!themeToggleBtn || !themeToggleIcon) return;

            const darkIconPath = '{{ asset('img/sombre.png') }}';
            const lightIconPath = '{{ asset('img/clair.png') }}';

            const updateIcon = () => {
                if (document.documentElement.classList.contains('dark')) {
                    themeToggleIcon.src = lightIconPath;
                    themeToggleIcon.alt = 'Lightmode Icon';
                } else {
                    themeToggleIcon.src = darkIconPath;
                    themeToggleIcon.alt = 'Darkmode Icon';
                }
            }

            // Set initial state
            if (localStorage.getItem('color-theme') === 'dark' ||
                (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            updateIcon();

            themeToggleBtn.addEventListener('click', () => {
                const html = document.documentElement;
                const currentTheme = localStorage.getItem('color-theme');

                if (currentTheme === 'light') {
                    html.classList.add('dark');
                    html.classList.remove('light');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    html.classList.remove('dark');
                    html.classList.add('light');
                    localStorage.setItem('color-theme', 'light');
                }
                updateIcon();
            });
        }


        document.addEventListener('alpine:init', () => {
            Alpine.data('themeSwitch', () => ({
                init() {
                    initThemeToggle();
                }
            }));
        });
    </script>
@endpush



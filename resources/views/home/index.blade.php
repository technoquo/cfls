<x-layout>
    <header class="fixed w-full">
        <x-partials.navbar />
    </header>
    @push('scripts')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script>
            function themeToggle() {
                return {
                    // Estado inicial basado en localStorage o tema predeterminado
                    theme: localStorage.getItem('theme') || 'light',
                    image: localStorage.getItem('theme') === 'light' ? '{{ asset('img/clair.png') }}' :
                        '{{ asset('img/sombre.png') }}',
                    toggleTheme() {
                        // Alternar entre 'dark' y 'light'
                        this.theme = this.theme === 'dark' ? 'light' : 'dark';

                        // Actualizar la imagen según el tema
                        this.image = this.theme === 'light' ?
                            '{{ asset('img/clair.png') }}' :
                            '{{ asset('img/sombre.png') }}';

                        // Guardar la preferencia en localStorage
                        localStorage.setItem('theme', this.theme);
                    }
                };
            }

            function menuToogle() {



            }
            
        </script>>
    @endpush
</x-layout>

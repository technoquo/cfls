import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Alata', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                csfl: '#008bcf', // Define tu color personalizado aquí
                csfllight: '#92D5FF', // Define tu color personalizado aquí
            },
            backgroundImage: {
                'fond-one': "url('/img/FOND_CLAIR_1.png')",
                'fond-two': "url('/img/FOND_CLAIR_2.png')",
            },
        },
    },

    plugins: [forms, typography],
};

import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                
            },
            spacing:{
                '128':'32rem',
                '256px':'57rem',
            },
            gridTemplateColumns:{

                'weather': '2fr 8fr 2fr',
            },
            colors: {
                bgblue: '#001022',
              },
              fontFamily: {
                poppins: ['Poppins', 'sans-serif'],
              },
        },
    },

    plugins: [forms],
};

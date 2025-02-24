import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Allows toggling between light and dark mode
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/js/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                serif: ["Merriweather", "Georgia", "serif"],
            },
            colors: {
                primary: '#003366', // Deep Blue
                highlight: '#D4AF37', // Gold
                deep: '#000000', // Black
                contrast: '#FFFFFF', // White
            }
        },
    },

    plugins: [forms, '@tailwindcss/typography'],
};

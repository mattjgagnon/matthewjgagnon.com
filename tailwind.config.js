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
                darkBg: "#1e1e1e",
                darkText: "#e0e0e0",
                darkAccent: "#3add2c",
                gold: "#D4AF37"
            }
        },
    },

    plugins: [forms],
};

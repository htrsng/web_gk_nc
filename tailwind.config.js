import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js', // Thêm đường dẫn đến file JS
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans], // Thay Figtree bằng Montserrat
                serif: ['Playfair Display', ...defaultTheme.fontFamily.serif], // Thêm font chữ decorative
            },
            colors: {
                pink: {
                    50: '#fdf2f8',
                    100: '#fce7f3',
                    200: '#fbcfe8',
                    300: '#f9a8d4',
                    400: '#f472b6',
                    500: '#ec4899',
                    600: '#db2777', // Màu chủ đạo
                    700: '#be185d',
                    800: '#9d174d',
                    900: '#831843',
                }
            }
        },
    },

    plugins: [
        forms,
        require('@tailwindcss/typography'), // Thêm plugin typography
    ],
};
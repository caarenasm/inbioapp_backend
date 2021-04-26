const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
/* USAR una vez por lo menos el color en algun blade y no solo en las clases */
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'color-primario': {
                    300: '#00746b',
                    DEFAULT: '#007476',
                    700: '#007494',
                },
                'color-peligro': {
                    300: '#e79996',
                    DEFAULT: '#F69D9A',
                    700: '#ff9690',
                },
                'fondo-verde': {
                    DEFAULT: '#276c70',
                },
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};

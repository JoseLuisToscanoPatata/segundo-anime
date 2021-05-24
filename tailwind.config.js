const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        screens: {
            xs: "400px", //Usado en múltiples vistas

            xs2: "450px", //Usado en los perfiles de anime, manga y usuario

            xs3: "540px", //Usado en el perfil de usuario

            sm: "640px",
            // => @media (min-width: 640px) { ... }

            sm2:"700px", //Usado en el perfil de usuario

            doble: "750px", //Usado en las listas principales de anime y manga

            md: "768px",
            // => @media (min-width: 768px) { ... }

            md2: "850px", //Usado en el perfil de usuario

            lg: "1024px",
            // => @media (min-width: 1024px) { ... }

            dashboard: "1100px", //Usado en el dashboard

            triple: "1125px", //Usado en las listas principales de anime y manga

            xl: "1280px",
            // => @media (min-width: 1280px) { ... }

            "2xl": "1536px",
            // => @media (min-width: 1536px) { ... }
        },
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },

            colors: { //Colores extras
                lime: colors.lime,
                rose: colors.rose,
                lightBlue: colors.lightBlue,
                fuchsia: colors.fuchsia,
                violet: colors.violet,
                cyan: colors.cyan,
                teal: colors.teal,
                emerald: colors.emerald,
                amber: colors.amber,
                warmGray: colors.warmGray,
                trueGray: colors.trueGray,
                coolGray: colors.coolGray,
                blueGray: colors.blueGray,
                orange: colors.orange,
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"], //opacidad para los botones desactivados
            scale: ["active"], //Tamaño para los botones o campos pulsados
            height: ["active"], //Altura para los componentes pulsados
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};

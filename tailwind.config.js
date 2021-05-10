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
            xs: "400px",

            sm: "640px",
            // => @media (min-width: 640px) { ... }

            doble: "750px",

            md: "768px",
            // => @media (min-width: 768px) { ... }

            lg: "1024px",
            // => @media (min-width: 1024px) { ... }

            dashboard: "1100px",

            triple: "1125px",

            xl: "1280px",
            // => @media (min-width: 1280px) { ... }

            "2xl": "1536px",
            // => @media (min-width: 1536px) { ... }
        },
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },

            colors: {
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
            opacity: ["disabled"],
            scale: ["active"],
            height: ["active"],
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};

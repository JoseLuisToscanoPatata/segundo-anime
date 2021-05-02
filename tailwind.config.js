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
            dashboard: "1100px",
            ...defaultTheme.screens,
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
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};

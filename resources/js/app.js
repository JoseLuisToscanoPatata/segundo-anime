require("./bootstrap");

// Import modules...

import { createApp, h } from "vue";
import { Doughnut } from "vue3-chart-v2"; //Modulo de las gráficas

import {
    App as InertiaApp,
    plugin as InertiaPlugin,
} from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";

const el = document.getElementById("app");

createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})
    .mixin({ methods: { route } })
    .use(InertiaPlugin,Doughnut) //Añadimos el modulo de la gráfica con forma de donut
    .mount(el);

InertiaProgress.init({ color: "#4B5563" });

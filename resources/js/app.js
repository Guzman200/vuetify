import Vue from 'vue';
import Vuetify from 'vuetify'
import VueRouter from 'vue-router';

import { router } from './routes.js'

Vue.use(Vuetify);
Vue.use(VueRouter)

window.axios = require('axios');

window.axios.defaults.withCredentials = true;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';





const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(
        {
            theme: { dark:  false}
        }
    ),
    router,
    data: () => ({
        drawers: ['Default (no property)', 'Permanent', 'Temporary'],
        primaryDrawer: {
            model: null,
            type: 'default (no property)',
            clipped: true,
            floating: false,
            mini: false,
        },
        footer: {
            inset: true,
        },
        drawer: null,
        selectedItem: 0,
        items: [
            { text: "Graficas", icon: "mdi-chart-areaspline", to: "/graficas" },
            { text: "Usuarios (datatables)", icon: "mdi-account-group", to: "/usuarios" },
            { text: "Generar código QR", icon: "mdi-qrcode-scan", to: "/qr" },
        ]
    }),
});

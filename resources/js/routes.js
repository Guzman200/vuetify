import VueRouter from 'vue-router';

import Graficas from './components/Graficas.vue';
import Datatable from './components/Datatable.vue';
import CodigoQr from './components/CodigoQr.vue';

export const router = new VueRouter({
    base: '/',
    mode: 'history',
    routes: [
        { path: '/graficas', component: Graficas },
        { path: '/usuarios', component: Datatable },
        { path: '/qr', component: CodigoQr },
    ]
});


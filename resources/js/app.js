require('./bootstrap');

import Vue from 'vue';
import PortalVue from 'portal-vue';

import 'sweetalert2/dist/sweetalert2.min.css';
import 'nprogress/nprogress.css';
import router from "./routes/router";
import store from './stores/store';
import Vuelidate from 'vuelidate';
import swal from 'sweetalert2';

window.swal = swal;

Vue.use(Vuelidate);
Vue.use(PortalVue);

Vue.component('app', require('./App.vue').default);

const app = new Vue({
    router,
    store
}).$mount('#app');


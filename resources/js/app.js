require('./bootstrap');

import Vue from 'vue'
import PortalVue from 'portal-vue'
import 'nprogress/nprogress.css'
import router from "./routes/router";
import store from './stores/store'


Vue.use(PortalVue);

Vue.use(require('vue-moment'));

// Shared
Vue.component('app', require('./App.vue').default);

const app = new Vue({
    router,
    store
}).$mount('#app');


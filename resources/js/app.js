require('./bootstrap');

//window.Vue = require('vue');
import Vue from 'vue'
import VueRouter from 'vue-router'
import PortalVue from 'portal-vue'
import 'nprogress/nprogress.css'
import router from "./router";

Vue.use(VueRouter);
Vue.use(PortalVue);

Vue.use(require('vue-moment'));

// Shared
Vue.component('app', require('./App.vue').default);

//Vue.component('layout', require('./shared/Layout.vue').default);
//Vue.component('pagination', require('laravel-vue-pagination'));

// Projects
//Vue.component('activity-component', require('./components/ActivityComponent.vue').default);
//Vue.component('project-card', require('./components/ProjectCard.vue').default);


const app = new Vue({
    router
}).$mount('#app');


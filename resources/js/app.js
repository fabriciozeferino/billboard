
require('./bootstrap');

import PortalVue from 'portal-vue'
import Vue from 'vue'
//window.Vue = require('vue');

Vue.use(PortalVue);
Vue.use(require('vue-moment'));

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ActivityComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('activity-component', require('./components/ActivityComponent.vue').default);
// Vue.component('navbar-component', require('./components/shared/NavbarComponent.vue').default);
// Vue.component('project-card', require('./components/ProjectCard.vue').default);

// Icons
//Vue.component('icon-base', require('./components/IconBase.vue').default);

Vue.component('layout', require('./shared/Layout.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app',
});

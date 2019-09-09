import Vue from 'vue'
import Router from 'vue-router'
import NProgress from 'nprogress'

// Routes files
import auth from './auth.js'
import main from './main.js'
import project from './project.js'

const routes = [...auth, ...main, ...project];

Vue.use(Router);

const router = new Router({
    mode: 'history',
    routes
});

router.beforeEach((routeTo, routeFrom, next) => {
    NProgress.start();

    const loggedIn = localStorage.getItem('token');

    if (routeTo.matched.some(route => route.meta.requiresAuth) && !loggedIn) {
        next({ name: 'login' });
        return
    }

    // if logged in redirect to Home
    if(routeTo.path === '/login' && loggedIn) {
        next({ name: 'home' });
        return
    }

    next();
});

router.afterEach(() => {
    NProgress.done()
});

export default router

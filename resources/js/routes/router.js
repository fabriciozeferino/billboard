import Vue from 'vue'
import Router from 'vue-router'
import NProgress from 'nprogress'

// Routes files
import auth from './auth.js'
import main from './main.js'
import project from './project.js'
import store from './../stores/store.js'

const routes = [...auth, ...main, ...project];

Vue.use(Router);

const router = new Router({
    mode: 'history',
    routes
});

import nextFactory from '../middleware/middleware.js'

router.beforeEach((to, from, next) => {
    NProgress.start();

    if (to.meta.middleware) {
        const middleware = Array.isArray(to.meta.middleware)
            ? to.meta.middleware
            : [to.meta.middleware];

        const context = {
            from,
            next,
            router,
            to,
        };
        const nextMiddleware = nextFactory(context, middleware, 1);

        return middleware[0]({ ...context, next: nextMiddleware });
    }
    return next();
});

router.afterEach(() => {
    NProgress.done()
});



export default router

import Vue from 'vue'
import Router from 'vue-router'
import NProgress from 'nprogress'
import NotFound from './views/NotFound.vue'
import NetworkIssue from './views/NetworkIssue.vue'
import Home from './views/Home.vue'
import Projects from './views/Projects.vue'
import ProjectCreate from './views/ProjectCreate.vue'
import Reports from './views/Reports.vue'
import store from './store'

import LoginComponent from "./components/auth/LoginComponent";
import DashboardComponent from "./components/auth/DashboardComponent";

Vue.use(Router);

const router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            redirect: {name: 'home'}
        },
        {
            path: '/login',
            name: 'login',
            component: LoginComponent
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: DashboardComponent,
            meta: { requiresAuth: true }
        },


        {
            path: '/home',
            name: 'home',
            component: Home,
            meta: { requiresAuth: true },
            props: true
        }, {
            path: '/projects',
            name: 'projects',
            component: Projects,
            meta: { requiresAuth: true },
        },
        {
            path: '/project/create',
            name: 'project-create',
            meta: { requiresAuth: true },
            component: ProjectCreate
        },
        {
            path: '/reports',
            name: 'reports',
            meta: { requiresAuth: true },
            component: Reports
        },
        /*{
            path: '/project/:id',
            name: 'project-show',
            component: Project,
            props: true,
            beforeEnter(routeTo, routeFrom, next) {
                store
                    .dispatch('project/fetchEvent', routeTo.params.id)
                    .then(project => {
                        routeTo.params.project = project
                        next()
                    })
                    .catch(error => {
                        if (error.response && error.response.status === 404) {
                            next({name: '404', params: {resource: 'project'}})
                        } else {
                            next({name: 'network-issue'})
                        }
                    })
            }
        },*/
        {
            path: '/404',
            name: '404',
            component: NotFound,
            props: true
        },
        {
            path: '/network-issue',
            name: 'network-issue',
            component: NetworkIssue
        },
        {
            path: '*',
            redirect: {name: '404'}
            //redirect: {name: '404', params: {resource: 'page'}}
        }
    ]
});

router.beforeEach((routeTo, routeFrom, next) => {
    NProgress.start();

    const loggedIn = localStorage.getItem('user');

    //console.log(loggedIn);

    if (routeTo.matched.some(route => route.meta.requiresAuth) && !loggedIn) {
        next({ name: 'login' });
        return
    }
    //next()

    // check if the route requires authentication and user is not logged in
    /*if (routeTo.matched.some(route => route.meta.requiresAuth) && !store.state.isLoggedIn) {
        // redirect to login page
        next({ name: 'login' });
        return
    }
*/
    // if logged in redirect to dashboard
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

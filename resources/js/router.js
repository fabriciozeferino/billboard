import Vue from 'vue'
import Router from 'vue-router'
import NProgress from 'nprogress'
import NotFound from './views/NotFound.vue'
import NetworkIssue from './views/NetworkIssue.vue'
import Home from './views/Home.vue'
import Projects from './views/Projects.vue'
import ProjectCreate from './views/ProjectCreate.vue'
import Reports from './views/Reports.vue'

Vue.use(Router);

const router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Home,
            props: true
        },{
            path: '/projects',
            name: 'projects',
            component: Projects,
            props: true
        },
        {
            path: '/project/create',
            name: 'project-create',
            component: ProjectCreate
        },
        {
            path: '/reports',
            name: 'reports',
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
            refirect: '/home'
            //redirect: {name: '404', params: {resource: 'page'}}
        }
    ]
});

router.beforeEach((routeTo, routeFrom, next) => {
    NProgress.start();
    next()
});

router.afterEach(() => {
    NProgress.done()
});

export default router

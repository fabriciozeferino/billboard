//import Projects from '../views/Projects.vue'
let Projects = () => import('../views/Projects.vue');

//import ProjectCreate from '../views/ProjectCreate.vue'
let ProjectCreate = () => import('../views/ProjectCreate.vue');

import authMiddleware from '../middleware/authMiddleware.js';
import log from '../middleware/log.js';

const router =  [
         {
            path: '/projects',
            name: 'projects',
            component: Projects,
             meta: {
                 middleware: [
                     authMiddleware,
                     log
                 ],
             },
        },
        {
            path: '/project/create',
            name: 'project-create',
            component: ProjectCreate,
            meta: {
                middleware: [
                    authMiddleware,
                    log
                ],
            },
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

    ];

export default router

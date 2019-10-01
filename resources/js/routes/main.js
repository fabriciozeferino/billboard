import Home from '../views/Home.vue'
import DashboardComponent from "../components/auth/DashboardComponent";

import NotFound from '../views/NotFound.vue'
import NetworkIssue from '../views/NetworkIssue.vue'
import Reports from '../views/Reports.vue'


const router = [
    {
        path: '/',
        redirect: {name: 'home'}
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: DashboardComponent,
        meta: {requiresAuth: true}
    },
    {
        path: '/home',
        name: 'home',
        component: Home,
        meta: {requiresAuth: true},
        props: true
    },
    {
        path: '/reports',
        name: 'reports',
        meta: {requiresAuth: true},
        component: Reports
    },
    // Handles
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
        redirect: {name: 'login'}
    }
];

export default router

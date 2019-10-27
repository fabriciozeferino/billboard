import LoginComponent from '../components/auth/LoginComponent';
//import RegisterComponent from '../components/auth/RegisterComponent';

let RegisterComponent = () => import('../components/auth/RegisterComponent');

import publicMiddleware from "../middleware/publicMiddleware.js";
import log from '../middleware/log.js';


const router = [
    {
        path: '/login',
        name: 'login',
        component: LoginComponent,
        meta: {
            middleware: [
                publicMiddleware,
                log
            ],
        },
    }, {
        path: '/register',
        name: 'register',
        component: RegisterComponent,
        meta: {
            middleware: [
                publicMiddleware,
                log
            ],
        },
    },
];

export default router

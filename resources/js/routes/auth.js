import LoginComponent from '../components/auth/LoginComponent';
import RegisterComponent from '../components/auth/RegisterComponent';

const router = [
    {
        path: '/login',
        name: 'login',
        component: LoginComponent
    }, {
        path: '/register',
        name: 'register',
        component: RegisterComponent
    },
];

export default router

import store from "../stores/store.js";


export default function authMiddleware({next, router, to}) {

    if (!localStorage.getItem('token')) {
        store.dispatch('auth/logout')
    }

    if (!store.state.auth.loggedIn){
        store.dispatch('auth/logout');
    }

    if (!axios.defaults.headers.common.Authorization){
        store.dispatch('auth/logout');
    }

    return next();
}

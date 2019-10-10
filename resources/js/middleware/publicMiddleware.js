import store from "../stores/store";

// If user logged in and try to access login and register routes redirect to home

export default function publicMiddleware({next, router, to}) {

    const loggedIn = store.state.auth.loggedIn;

    if (to.path === '/login' && loggedIn) {
        router.push({name: 'home'});
        return
    }

    if (to.path === '/register' && loggedIn) {
        router.push({name: 'home'});
        return
    }

    return next();
}

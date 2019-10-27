import {mapActions, mapGetters, mapState} from 'vuex'

export const authComputed = {
    ...mapGetters('auth', [
        'isLoggedIn',
        'user'
    ]),
};

export const authMethods = {
    ...mapActions('auth', [
        'logout',
        'setUser'
        /*'fetchToken'*/]),
};

export const authStates = {
    ...mapState('auth', [
        'user',
        'token',
        'loggedIn'
        ]),
};

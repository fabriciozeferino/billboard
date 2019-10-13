export const namespaced = true;

export const state = {
    user: {},
    token: localStorage.getItem('token') || '',
    loggedIn: !!localStorage.getItem('token'),
};

export const mutations = {

    LOGIN(state, response) {
        const token = response.token;
        const user = response.user;

        localStorage.setItem('token', token);
        localStorage.setItem('user', JSON.stringify(user));

        window.axios.defaults.headers.common['Authorization'] = `Bearer ${
            token
        }`;

        state.token = token;
        state.user = user;
        state.loggedIn = true;
    },

    LOGOUT(state) {
        state.token = null;
        state.user = {};
        state.loggedIn = false;
        //location.reload()
    },

    UPDATE_TOKEN(state, data) {

        const token = data.token;
        const user = data.user;

        localStorage.setItem('token', token);
        localStorage.setItem('user', JSON.stringify(user));

        state.token = token;
        state.user = user;
        state.loggedIn = true;

        axios.defaults.headers.common['Authorization'] = `Bearer ${
            token
        }`;
    }
};

export const actions = {

    register({commit}, credentials) {
        return axios
            .post('auth/register', credentials)
            .then(response => {
                commit('LOGIN', response.data)
            })
    },

    login({commit, dispatch}, credentials) {


        return axios.post('auth/login', credentials)
            .then(response => {
                commit('LOGIN', response.data);
            }).catch(error => {
                console.log(error)
            })
    },

    logout({commit, dispatch}) {
        return axios.post('auth/logout')
            .then(response => {

                localStorage.removeItem('token');
                localStorage.removeItem('user');

                delete axios.defaults.headers.common.Authorization;

                commit('LOGOUT');
                //resolve()
                //return response;
            })
            .catch(error => {
                commit('LOGOUT');

                localStorage.removeItem('token');
                localStorage.removeItem('user');

                delete axios.defaults.headers.common.Authorization;
            });
    },


    fetchToken({commit}, token) {
        return axios.post('api/v1/auth/check-token', {token})
            .then(response => {
                console.log('fetchToken ok', response.data)
                commit('UPDATE_TOKEN', response.data);
            })
            .catch(error => {
                console.log('fetchToken error', error)
                commit('LOGOUT')
            });
    }
};

export const getters = {

    isLoggedIn(state) {
        return !!state.token
    },

    user(state) {
        return state.user
    },

    token(state) {
        return state.token
    },
};

export const namespaced = true;

export const state = {
    user: {},
    token: null,
    loggedIn: false,
};

export const mutations = {

    LOGIN(state, response) {
        const token = response.token;
        const user = response.user;

        localStorage.setItem('token', token);
        localStorage.setItem('user', JSON.stringify(user));

        axios.defaults.headers.common['Authorization'] = `Bearer ${
            token
        }`;

        state.token = token;
        state.user = user;
        state.loggedIn = true;
    },

    LOGOUT(state) {
        localStorage.removeItem('token');
        localStorage.removeItem('user');

        delete axios.defaults.headers.common['Authorization'];

        state.token = null;
        state.user = {};
        state.loggedIn = false;
        //location.reload()
    },

    UPDATE_TOKEN(state, data) {
        const token = data.token.token;
        const user = data.user;

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

        console.log(credentials)
        return axios
            .post('/api/v1/auth/register', credentials)
            .then(response => {

                console.log(response.data);
                commit('LOGIN', response.data)
            })
    },

    login({commit, dispatch}, credentials) {
        return axios.post('/api/v1/auth/login', credentials)
            .then(response => {

                commit('LOGIN', response.data);
            })
    },

    logout({commit}) {
        return axios
            .post('/api/v1/auth/logout')
            .then(() => {

                commit('LOGOUT')
            })
    },

    fetchToken({commit}, token) {

        return axios.post('api/v1/auth/check-token', {token})
            .then(response => {

                commit('UPDATE_TOKEN', response.data);
            })
            .catch(error => {

                console.error(error);
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
};

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
        return axios
            .post('//localhost:3000/register', credentials)
            .then(({data}) => {
                commit('SET_USER_DATA', data)
            })
    },

    login({commit, dispatch}, credentials) {
        return axios.post('/api/v1/auth/login', credentials)
            .then(response => {

                commit('LOGIN', response.data);
            })
           /* .catch(function (error) {

                const notification = {
                    type: 'error',
                    message: 'There was a problem creating your event: '/!* + error.response.data*!/
                };
                dispatch('notifications/add', notification, {root: true})
                throw error.message;
                // Error
                /!* if (error.response) {


                     // The request was made and the server responded with a status code
                     // that falls out of the range of 2xx
                     console.log('The request was made and the server responded with a status code')
                     console.log(error.response.data);
                     console.log(error.response.status);
                     console.log(error.response.headers);
                 } else if (error.request) {
                     // The request was made but no response was received
                     // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                     // http.ClientRequest in node.js
                     console.log('The request was made but no response was received')
                     console.log(error.request);
                 } else {
                     console.log('Something happened in setting up the request that triggered an Error')
                     console.log('Error', error.message);
                 }
                 console.log(error.config);*!/
            });*/
    },

    logout({commit}) {
        return axios
            .post('/api/v1/auth/logout')
            .then(() => {

                commit('LOGOUT')
            })
        /*.catch(error => {

            console.error(error);
            console.log(error)
        });*/
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

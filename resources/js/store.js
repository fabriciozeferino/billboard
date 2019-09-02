import Vue from 'vue'
import Vuex from 'vuex'
import router from "./router";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        user: null
    },
    mutations: {
        SET_USER_DATA (state, userData) {
            state.user = userData;
            localStorage.setItem('user', JSON.stringify(userData.user));
            axios.defaults.headers.common['Authorization'] = `Bearer ${
                userData.access_token
            }`
        },
        CLEAR_USER_DATA () {
            localStorage.removeItem('user');
            axios.defaults.headers.common['Authorization'] = '';
            location.reload()
        }
    },
    actions: {
        register ({ commit }, credentials) {
            return axios
                .post('//localhost:3000/register', credentials)
                .then(({ data }) => {
                    commit('SET_USER_DATA', data)
                })
        },
        login ({ commit }, credentials) {
            return axios
                .post('/api/v1/auth/login', credentials)
                .then(({ data }) => {
                    commit('SET_USER_DATA', data);
                })
                .catch(error => console.log(error))
        },
        logout ({ commit }) {
            return axios
                .post('/api/v1/auth/logout')
                .then(() => commit('CLEAR_USER_DATA'))
                .catch(error => console.log(error))
        }
    },
    getters: {
        loggedIn (state) {
            return !!state.user
        },
        user (state) {
            return state.user.user
        }
    }
})

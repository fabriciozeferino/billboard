<template>
    <div id="app">
        <layout></layout>
    </div>
</template>

<script>
    import Layout from './shared/Layout.vue'

    import {authComputed, authMethods, authStates} from './views/helper.js'

    export default {
        components: {
            Layout
        },

        computed: {
            ...authComputed,
            ...authStates
        },

        methods: {
            ...authMethods,
        },

        mounted() {
            this.$store.subscribe((mutation, state) => {
                if (!state.auth.loggedIn && this.$router.currentRoute.name !== 'login') {
                    this.$router.push({name: 'login'})
                }
            })
        },


        beforeMount() {
            axios.interceptors.request.use((request) => {
                    return new Promise(function (resolve, reject) {
                        const token = localStorage.getItem('token');
                        if (token) {
                            request.headers['Authorization'] = 'Bearer ' + token;
                        }
                        resolve(request)
                    })
                }
            );


            /* console.log(this.$store)*/
            axios.interceptors.response.use(undefined, function (err) {

                    if (err.status === 401 || err.config || !err.config.__isRetryRequest) {
                        return new Promise((resolve, reject) => {

                            localStorage.removeItem('token');
                            localStorage.removeItem('user');

                            delete axios.defaults.headers.common.Authorization;



                            resolve(router.name('login'))
                        });
                    }

            });

            /*axios.interceptors.response.use((response) => {
                return response
                console.log(response)
            }, function (error) {
                let originalRequest = error.config
                console.log(originalRequest)
                if (error.response.status === 401) {
                    return new Promise((resolve, reject) => {
                        localStorage.removeItem('token');
                        localStorage.removeItem('user');

                        delete axios.defaults.headers.common.Authorization;

                        resolve(error.response)
                    })

                }
                // Do something with response error
                return Promise.resolve(error)
            })*/
        }
    }
</script>

<template>
    <div id="app">
        <layout></layout>
    </div>
</template>

<script>
    import Layout from './shared/Layout.vue'

    import {authComputed} from './views/helper.js'
    import {authMethods} from './views/helper.js'
    import {authStates} from './views/helper.js'


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
                if (!state.auth.loggedIn) {
                    this.$router.push({name: 'login'})
                }
            })
        },

        created() {

            /*axios.interceptors.response.use(function (response) {
                // Do something with response data
                return response;
            }, function (error) {
                if (error.response.status === 401) {

                    this.$swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>Why do I have this issue?</a>'
                    });
                    console.log(error.response)
                }
                //return Promise.reject(error);
            });*/

            /*axios.interceptors.response.use(undefined, function (err) {
                return new Promise(function (resolve, reject) {
                    console.log(err.status)
                    if (err.status === 401 && err.config && !err.config.__isRetryRequest) {
                        console.log('here')
                        /!*this.$store.dispatch('auth/logout')
                        $this.$router.name('login')*!/
                    }
                    //throw err;
                });
            });*/

            const token = localStorage.getItem('token');

            if (token) {
                this.$store.dispatch('auth/fetchToken', token);
            }
        }
    }
</script>

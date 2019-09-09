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
                if (!state.auth.loggedIn){
                    this.$router.push({name: 'login'})
                }
            })
        },

        created() {
            const token = localStorage.getItem('token');

            if (token) {
                this.$store.dispatch('auth/fetchToken', token);
            }


            axios.interceptors.response.use(undefined, function (err) {
                return new Promise(function (resolve, reject) {
                    if (err.status === 401 && err.config && !err.config.__isRetryRequest) {
                        this.$store.dispatch('auth/logout')
                    }
                    throw err;
                });
            });
        }
    }
</script>

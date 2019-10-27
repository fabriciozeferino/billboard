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

        /*beforeMount() {
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
        }*/
    }
</script>

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
            });

            const token = localStorage.getItem('token');
            const user = localStorage.getItem('user');

            console.log(this.user)
            console.log('gfsgfsdgfdsgfdsgfds')
            //this.$store.dispatch('auth/setUser', {token, user});
            if (this.$router.currentRoute.name !== 'login'){

                this.$store.dispatch('auth/setUser', {token, user});
            }
            // console.log(this.$store.actions('auth/user'))
            // if (!this.$store('auth/user')) {
            //
            //     console.log('helllllooooo')
            //     this.$store
            //         .dispatch('auth/setUser', {
            //             token, user
            //         });
            // }
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
        }
    }
</script>

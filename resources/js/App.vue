<template>
    <div id="app">
        <layout></layout>
    </div>
</template>

<script>
    import Layout from './shared/Layout.vue'

    export default {
        components: {
            Layout
        },
        created() {

            /*if (localStorage.authUser) {
                axios.get('/api/v1/auth/user ', {
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
                    },
                ).then(response => {


                    store.commit('loginUser')
                }).catch(error => {

                    if (error.response.status === 401 || error.response.status === 403) {
                        store.commit('logoutUser');
                        localStorage.setItem('token', '');
                        this.$router.push({name: 'login'});
                    }
                });
            }*/

        }
    }
</script>

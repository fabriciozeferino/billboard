<template>
    <div>
        <h1>Project show</h1>

        {{ $route.params.id }}
        <router-link :to="{ name: 'home' }">Or go back to the home page</router-link>
    </div>
</template>
<script>
    import {projectComputed, projectMethods} from '../stores/modules/projectsHelper'
    import ProjectCard from '../components/project/ProjectCard.vue'

    export default {

        mounted() {
            /*window.axios.get(`projects/${this.$route.params.id}`)
                .then(response => {
                    this.$store.dispatch('projects/setProjects', response.data.data);
                });*/
        },
        computed: {
            ...projectComputed,
            /*project () {
                console.log(this.$store)
                return this.$store.getters.project(this.$route.params.id)
            }*/
        },

        methods: {
            ...projectMethods,
        },
        components: {
            ProjectCard
        }
    }
</script>

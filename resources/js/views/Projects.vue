<template>
    <div id="app">
        <div v-for="project in projects">
            <ProjectCard :project="project"></ProjectCard>
        </div>
    </div>
</template>

<script>
    import {projectComputed, projectMethods} from '../stores/modules/projectsHelper'
    import ProjectCard from '../components/project/ProjectCard.vue'

    export default {

        mounted() {
            console.log(this.$store)
            this.$store.dispatch('projects/show');
        },
        computed: {
            ...projectComputed,
        },

        methods: {
            ...projectMethods
            /*load() {
                axios.get('projects').then((response) => {
                    this.$store.commit('projects/setProjects', response.data);
                });
            },*/
        },

        components: {
            ProjectCard
        }
    }
</script>


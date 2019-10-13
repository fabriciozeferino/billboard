<template>
    <div id="app">
        <div v-for="project in projects">
            <ProjectCard :project="project"></ProjectCard>
        </div>
    </div>
</template>

<script>
    import ProjectCard from '../components/project/ProjectCard.vue'

    export default {
        data() {
            return {
                projects: []
            }
        },
        mounted() {
            this.fetchData();
        },

        methods: {
            fetchData() {
               return window.axios.get('projects')
                    .then(response => {
                        this.projects = response.data
                    }).catch(error => {
                    console.error(error)
                })
            }
        },

        components: {
            ProjectCard
        }
    }
</script>


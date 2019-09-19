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
        created() {
            this.fetchData();
        },

        methods: {
            fetchData() {

                axios.get('/api/v1/projects')
                    .then(response => {
                        this.projects = response.data
                    }).catch(error => {
                     console.error(error.response)
                })
            }
        },

        components: {
            ProjectCard
        }
    }
</script>


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
                // this.error = this.users = null;
                // this.loading = true;
                window.axios
                    .get('/api/projects')
                    .then(response => {
                        console.log(response);

                        this.projects = response.data
                    });
            }
        },

        components: {
            ProjectCard
        }
    }
</script>


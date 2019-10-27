<template>
    <div>
        <div v-for="project in projects.data">
            <ProjectCard :project="project"></ProjectCard>
        </div>



        <div class="d-block mt-3">
            <pagination :data="projects" :show-disabled="true" size="small" align="center"
                        @pagination-change-page="getResults">
            </pagination>
        </div>
    </div>
</template>

<script>
    import {projectComputed, projectMethods} from '../stores/modules/projectsHelper'
    import ProjectCard from '../components/project/ProjectCard.vue'

    export default {

        mounted() {
            this.$store.dispatch('projects/show');
        },
        computed: {
            ...projectComputed,
        },

        /*methods: {
            ...projectMethods,
            load() {
                this.$store.dispatch('projects/show');
                /!*axios.get('projects').then((response) => {
                    this.$store.commit('projects/setProjects', response);
                });*!/
            },
        },*/
        methods: {
            ...projectMethods,
            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                axios.get('projects?page=' + page)
                    .then(response => {
                        this.$store.dispatch('projects/setProjects', response.data.data);
                    });
            }
        },

        components: {
            ProjectCard
        }
    }
</script>


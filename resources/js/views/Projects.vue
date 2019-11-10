<template>
    <div>
        <div class="container mx-auto">
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
                <div class="my-4 px-4 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3" v-for="project in projects.data"
                     :key="project.id">
                    <ProjectCard :project="project"></ProjectCard>
                </div>
            </div>
        </div>

        <pagination :data="projects"
                    @pagination-change-page="getResults">
        </pagination>

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

        methods: {
            ...projectMethods,

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
<style>
    /*.page-link {
        padding: 0 .50rem !important;
    }*/
</style>


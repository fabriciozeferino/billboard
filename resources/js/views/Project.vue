<template>
    <div>
        <ProjectCard :project="this.getProject(this.$route.params.id)"></ProjectCard>

    </div>
</template>
<script>
    import {projectComputed, projectMethods} from '../stores/modules/projectsHelper'
    import ProjectCard from '../components/project/ProjectCard.vue'

    export default {

        mounted() {
           // this.project = this.getProject(this.$route.params.id);
        },
        computed: {
            ...projectComputed,
        },

        methods: {
            ...projectMethods,

        },
        components: {
            ProjectCard
        }
    }
</script>

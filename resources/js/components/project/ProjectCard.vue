<template>
    <div>
        <!-- Article -->
        <article class="overflow-hidden rounded-lg shadow-lg bg-white">

            <a href="#">
                <img alt="Placeholder" class="block h-auto w-full"
                     src="https://picsum.photos/300/100/?random">
            </a>

            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                <h1 class="text-lg no-underline hover:underline text-black" @click="editProject(project.id)">
                        {{ project.title }}
                </h1>
            </header>

            <div class="p-2 md:p-4">{{ project.description}}</div>

            <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                <a class="flex items-center no-underline hover:underline text-black" href="#">
                    <img alt="Placeholder" class="w-10 h-10 rounded-full mr-4"
                         src="https://picsum.photos/32/32/?random">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none">Jonathan Reinink</p>
                        <p class="text-gray-600">Aug 18</p>
                        <div class="mt-2 flex items-center">
                            <svg v-for="i in 5" :class="i <= project.id ? 'text-blue-500' : 'text-gray-400'"
                                 class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M10 1.3l2.388 6.722H18.8l-5.232 3.948 1.871 6.928L10 14.744l-5.438 4.154 1.87-6.928-5.233-3.948h6.412L10 1.3z"/>
                            </svg>
                        </div>
                    </div>
                </a>
                <!--@click.native="remove(project.id)"-->
                <Icon :name="'trash'"
                      class="mr-1 fill-current text-gray-200 hover:text-red-400 inline-block h-5 w-5 cursor-pointer"
                      @click.native="deleteProjects(project)"/>
            </footer>

        </article>

    </div>
</template>

<script>
    import Icon from "../../shared/Icon";
    import {projectMethods} from "../../stores/modules/projectsHelper";

    export default {
        name: "ProjectCard",
        props: ['project'],
        components: {
            Icon,
        },
        methods: {
            ...projectMethods,
            /*editProject(id) {
                this.$router.push({name:'project-show',params:{id}})
            }*/
        },
    }
</script>

<style scoped>

</style>

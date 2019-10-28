<template>
    <!--<div class="mt-6 w-full px-4 1/2">
        <div class="border rounded-lg p-6 overflow-hidden shadow-lg w-full bg-gray-100">
            <div class="text-gray-600 text-xs uppercase font-semibold">
               Id: {{ project.id }} &bull; Tasks: 12 &bull; Users: 3
            </div>
            <h4 class="font-semibold text-lg leading-tight truncate">
                {{ project.title }}
            </h4>
            <div class="text-gray-600 text-sm mt-3">
                {{ project.description}}
            </div>
            <div class="mt-2 flex items-center">
                <svg v-for="i in 5" :class="i <= project.id ? 'text-blue-500' : 'text-gray-400'"
                     class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M10 1.3l2.388 6.722H18.8l-5.232 3.948 1.871 6.928L10 14.744l-5.438 4.154 1.87-6.928-5.233-3.948h6.412L10 1.3z"/>
                </svg>
            </div>
        </div>-->

    <div>
        <!-- <div class="max-w-sm w-full lg:max-w-full lg:flex">
             <div
                 class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                 style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">
             </div>
             <div
                 class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                 <div class="mb-8">
                     <p class="text-sm text-gray-600 flex items-center">
                         <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 20 20">
                             <path
                                 d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z"/>
                         </svg>
                         Members only
                     </p>
                     <div class="text-gray-900 font-bold text-xl mb-2">Can coffee make you a better developer?</div>
                     <p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                         Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
                 </div>
                 <div class="flex items-center">
                     <img class="w-10 h-10 rounded-full mr-4" src="/img/jonathan.jpg" alt="Avatar of Jonathan Reinink">
                     <div class="text-sm">
                         <p class="text-gray-900 leading-none">Jonathan Reinink</p>
                         <p class="text-gray-600">Aug 18</p>
                     </div>
                 </div>
             </div>
         </div>-->


        <!-- Article -->
        <article class="overflow-hidden rounded-lg shadow-lg bg-white">

            <a href="#">
                <img alt="Placeholder" class="block h-auto w-full"
                     src="https://picsum.photos/300/100/?random">
            </a>

            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                <h1 class="text-lg">
                    <a class="no-underline hover:underline text-black" href="#">
                        {{ project.title }}
                    </a>
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
        <!-- END Article -->


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
        },
    }
</script>

<style scoped>

</style>

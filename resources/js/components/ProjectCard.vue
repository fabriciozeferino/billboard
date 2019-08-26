<template>
    <div class="mt-6 w-full px-4 lg:w-1/2 xl:w-1/3">
        <div class="border rounded-lg p-6 overflow-hidden shadow-lg w-full">
            <div class="text-gray-600 text-xs uppercase font-semibold">
                Tasks: 12 &bull; Users: 3
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
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProjectCard",
        props: ['project']
    }
</script>

<style scoped>

</style>

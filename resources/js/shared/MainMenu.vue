<template>
    <div>
        <div v-for="link in menu">
            <router-link
                class="flex h-8 my-2 items-center pl-3 hover:bg-gray-200"
                :to="{ name: link.name }">
                <div class="flex-auto text-gray-800 hover:text-gray-700 font-extrabold">
                    <icon :name="link.icon"
                          class="w-3 h-3 mr-1 fill-current inline-flex"/>
                    <small class="uppercase text-xs">{{ link.description }}</small>

                    <span v-if="link.name === 'projects'" class="ml-3 bg-red-800 text-white text-xs font-bold py-1 px-2 rounded-full">{{numberOfProjects}}</span>

                </div>
                <!-- Arrow in the end of menu -->
                <div class="invisible md:visible" :class="(currentPage === link.name) ? 'active' : 'inactive'">
                </div>
            </router-link>
        </div>

    </div>
</template>

<script>
    import Icon from './Icon'
    import {projectComputed, projectMethods} from '../stores/modules/projectsHelper'

    export default {
        components: {
            Icon,
        },
        data() {
            return {
                menu: [
                    {
                        name: 'home',
                        description: 'Home',
                        icon: 'dashboard'
                    }, {
                        name: 'projects',
                        description: 'Projects',
                        icon: 'office'
                    }, {
                        name: 'project-create',
                        description: 'Create',
                        icon: 'users'
                    }, {
                        name: 'project-trash',
                        description: 'Trash',
                        icon: 'trash'
                    }, {
                        name: 'reports',
                        description: 'Reports',
                        icon: 'printer'
                    }
                ],
                activeClass: 'active',
            }
        },
        computed: {
            currentPage() {
                return this.$route.name;
            },
            ...projectComputed
        },
        methods: {
            ...projectMethods
        },
    }
</script>

<style scoped>
    .router-link-exact-active {
        color: #4a5568 !important;
        background-color: #cbd5e0;
        -webkit-transition: background-color 0.2s linear;
        -ms-transition: background-color 0.2s linear;
        transition: background-color 0.2s linear;
    }

    .active {
        width: 0;
        height: 0;
        border-top: 15px solid transparent;
        border-bottom: 15px solid transparent;
        border-right: 7px solid #edf2f7;
    }

    .inactive {
        width: 0;
        height: 0;
        border-top: 15px solid transparent;
        border-bottom: 15px solid transparent;
        border-right: 15px solid transparent;
    }
</style>

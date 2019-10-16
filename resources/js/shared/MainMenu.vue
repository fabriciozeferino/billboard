<template>
    <div>
        <div v-for="link in menu">
            <router-link
                class="flex h-8 my-2 items-center group pl-3 text-grey-400 hover:text-grey-700 hover:bg-gray-200"
                :to="{ name: link.name }">
                <div class="flex-auto">
                    <icon :name="link.icon"
                          class="w-3 h-3 mr-1 fill-current inline-flex"/>
                    <small class="uppercase font-bold">{{ link.description }}</small>
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
            }
        }
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

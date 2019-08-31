<template>
    <div>
        <div class="mb-4">
            <router-link class="flex items-center group py-3 text-blue-400 hover:text-blue-700"
                         :to="{ name: 'home' }">
                <icon name="dashboard"
                      class="w-4 h-4 mr-2 fill-current inline-block"/>
                <div>
                    Home
                </div>
            </router-link>
        </div>
        <div class="mb-4">
            <router-link class="flex items-center group py-3 text-blue-400 hover:text-blue-700"
                         :to="{ name: 'projects' }">
                <icon name="office"
                      class="w-4 h-4 mr-2 fill-current inline-block"/>
                <div>
                    Projects
                </div>
            </router-link>
        </div>
        <div class="mb-4">
            <router-link class="flex items-center group py-3 text-blue-400 hover:text-blue-700"
                         :to="{ name: 'project-create' }">
                <icon name="users"
                      class="w-4 h-4 mr-2 fill-current inline-block"/>
                <div>
                    Create
                </div>
            </router-link>
        </div>

        <div class="mb-4">
            <router-link class="flex items-center group py-3 text-blue-400 hover:text-blue-700"
                         :to="{ name: 'reports' }">
                <icon name="printer"
                      class="w-4 h-4 mr-2 fill-current inline-block"/>
                <div>
                    Reports
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
        }
    }
</script>

<style scoped>
    .router-link-exact-active {
        color: #ffffff !important;
        border-bottom: solid 2px #ffffff;
    }
</style>

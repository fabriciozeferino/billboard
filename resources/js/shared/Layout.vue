<template>
    <div>
        <portal-target name="dropdown" slim/>
        <div class="flex flex-col">
            <div class="min-h-screen flex flex-col" @click="hideDropdownMenus">
                <div v-if="isLoggedIn" class="md:flex">
                    <div
                        class="bg-gray-200 md:w-56 px-3 py-2 flex items-center justify-between md:justify-center">
                        <a class="mt-1" href="/">
                            <logo class="inline-block" width="69" height="76"/>
                        </a>

                        <dropdown class="md:hidden" placement="bottom-end">
                            <svg class="text-gray-600 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                            </svg>
                            <div slot="dropdown" class="shadow-lg p-2 bg-gray-100 rounded">
                                <main-menu  />
                            </div>
                        </dropdown>

                    </div>
                    <div
                        class="bg-white border-b w-full p-4 md:py-0 md:px-12 text-sm md:text-base flex justify-between items-center">
                        <div class="mt-1 mr-4">Projects</div>

                        <dropdown class="mt-1" placement="bottom-end">
                            <div class="flex items-center cursor-pointer select-none group">
                                <div
                                    class="text-gray-800 group-hover:text-blue-700 focus:text-blue-600 mr-1 whitespace-no-wrap">
                                    <span>{{user.name}}</span>
                                </div>
                                <icon class="w-5 h-5 group-hover:fill-gray-700 fill-gray-800 focus:fill-gray-600"
                                      name="cheveron-down"/>
                            </div>

                            <div slot="dropdown" class="mt-2 py-2 shadow-lg bg-white rounded text-sm">

                                <router-link class="block px-4 py-2 hover:bg-orange-800 hover:text-white"
                                             :to="{ name: 'dashboard' }">Dashboard
                                </router-link>

                                <a class="block px-4 py-2 cursor-not-allowed">Manage Users</a>

                                <a class="block px-4 py-2 hover:bg-orange-800 hover:text-white" @click="logout">
                                    Logout
                                </a>

                            </div>
                        </dropdown>
                    </div>
                </div>
                <div class="flex flex-grow">
                    <div v-if="isLoggedIn" class="bg-gray-200 flex-no-shrink w-56 pl-2 hidden md:block">
                        <main-menu/>
                    </div>
                    <div class="w-full overflow-hidden p-2 md:p-5 bg-gray-100 flex justify-center" >

                        <router-view></router-view>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    /*import FlashMessages from './FlashMessages'*/
    import Dropdown from './Dropdown'
    import PortalVue from 'portal-vue'
    import MainMenu from './MainMenu'
    import Logo from './Logo'
    import Icon from './Icon'

    import {authComputed} from '../views/helper.js'


    export default {
        computed: {
            ...authComputed
        },

        components: {
            Dropdown,
            Logo,
            MainMenu,
            Icon,
            PortalVue
        },

        data() {
            return {
                showUserMenu: false,
            }
        },

        watch: {
            title: {
                immediate: true,
                handler(title) {
                    document.title = title ? `${title} | Fox Board` : 'Fox Board'
                },
            },
        },

        methods: {

            hideDropdownMenus() {
                this.showUserMenu = false
            },

            logout() {
                this.$store.dispatch('auth/logout');
            }

        },
    }
</script>

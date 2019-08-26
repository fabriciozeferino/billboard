<template>
    <nav class="flex items-center flex-wrap ">
        <div class="flex items-center flex-no-shrink text-gray-900 mr-6">
            <svg class="fill-current w-10 h-10 m-2" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M2.539 20H6l1.406-3.698-2.966-1.004L2.539 20zm10.055-3.698L14 20h3.461l-1.901-4.702-2.966 1.004zM18 2h-6.5L11 0H9l-.5 2H2c-.553 0-1 .447-1 1v11c0 .552.447 1 1 1h16c.553 0 1-.448 1-1V3c0-.552-.447-1-1-1z"/>
            </svg>
            <span class="font-semibold text-xl tracking-tight">Billboard</span>
        </div>

        <ul v-for="item in itens">
            <li class="block">
                <a :href="item.url"
                   class="no-underline text-blue-600 hover:text-blue-900 mr-5">
                    {{ item.name }}
                </a>
            </li>
        </ul>

    </nav>
</template>

<script>
    export default {
        name: "navbar",
        data() {
            return {
                itens: [
                    {
                        name: 'Projects',
                        url: '/projects'
                    },
                    {
                        name: 'Create',
                        url: '/projects/create'
                    }
                ]
            }
        }
    }
</script>

<style scoped>

</style>

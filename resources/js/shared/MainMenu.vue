<template>
    <div>
        <div class="mb-4">
            <a class="flex items-center group py-3" href="/home">
                <icon name="dashboard" class="w-4 h-4 mr-2" :class="isUrl('') ? 'fill-current text-gray-100' : 'fill-current text-blue-400 group-hover:text-blue-700 inline-block'" />
                <div :class="isUrl('') ? 'text-gray-100' : 'text-blue-400 group-hover:text-blue-700'">Home</div>
            </a>
        </div>
        <div class="mb-4">
            <a class="flex items-center group py-3" href="/projects">
                <icon name="office" class="w-4 h-4 mr-2" :class="isUrl('projects') ? 'fill-current text-gray-100' : 'fill-current text-blue-400 group-hover:text-blue-700 inline-block'" />
                <div :class="isUrl('projects') ? 'text-gray-100' : 'text-blue-400 group-hover:text-blue-700'">Organizations</div>
            </a>
        </div>
        <div class="mb-4">
            <a class="flex items-center group py-3">
                <icon name="users" class="w-4 h-4 mr-2" :class="isUrl('contacts') ? 'fill-current text-gray-100' : 'fill-current text-blue-400 group-hover:text-blue-700 inline-block'" />
                <div :class="isUrl('contacts') ? 'text-gray-100' : 'text-blue-400 group-hover:text-blue-700'">Contacts</div>
            </a>
        </div>
        <div class="mb-4">
            <a class="flex items-center group py-3">
                <icon name="printer" class="w-4 h-4 mr-2" :class="isUrl('reports') ? 'fill-current text-gray-100' : 'fill-current text-blue-400 group-hover:text-blue-700 inline-block'" />
                <div :class="isUrl('reports') ? 'text-gray-100' : 'text-blue-400 group-hover:text-blue-700'">Reports</div>
            </a>
        </div>
    </div>
</template>

<script>
    import Icon from './Icon'

    export default {
        components: {
            Icon,
        },
        methods: {
            isUrl(...urls) {
                if (urls[0] === '') {
                    return location.pathname.substr(1) === ''
                }

                return urls.filter(url => location.pathname.substr(1).startsWith(url)).length
            },
        },
    }
</script>

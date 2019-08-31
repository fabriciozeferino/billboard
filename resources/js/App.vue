<template>
    <div id="app">
        <layout :auth="auth"></layout>
    </div>
</template>

<script>
    import Layout from './shared/Layout.vue'

    export default {
        props: ['auth'],
        components: {
            Layout
        }
    }
</script>

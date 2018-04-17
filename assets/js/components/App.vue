<template>
    <div id="app">
        <Top></Top>
        <Booklist></Booklist>
    </div>
</template>

<script>
    import Top from './Top/Index.vue'
    import Booklist from './Booklist/Index.vue'

    export default {
        name: 'App',
        components: {
            Top,
            Booklist
        }
    }
</script>

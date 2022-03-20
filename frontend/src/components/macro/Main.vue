<template>
    <main>
        <router-view :key="$route.path"></router-view>
        <News />
        <WorkWith />
    </main>
</template>

<script>
import News from '../sections/News.vue';
import WorkWith from '../sections/WorkWith.vue';


export default {
    name: 'Main',
    components:{
        News,
        WorkWith,
    }
}
</script>

<style>

</style>
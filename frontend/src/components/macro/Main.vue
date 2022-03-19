<template>
    <main>
        <router-view :key="$route.path"></router-view>
        <News />
    </main>
</template>

<script>
import News from '../sections/News.vue';

export default {
    name: 'Main',
    components:{
        News,
    }
}
</script>

<style>

</style>
<template>
    <main>
        <Hero />
        <router-view :key="$route.path"></router-view>
    </main>
</template>

<script>
import Hero from "../sections/Hero.vue";

export default {
    name: 'Main',
    components:{
      Hero
    },
}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';

</style>
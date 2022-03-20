<template>
    <main>
        <!-- <Hero /> -->
        <!-- <Categories/> -->
        <div>
            <router-view :key="$route.path"></router-view>
        </div>
    </main>
</template>

<script>
// import Hero from "../sections/Hero.vue";
// import Categories from "../sections/Categories.vue";
export default {
    name: 'Main',
    components:{
    //   Hero,
    //   Categories,
    },
}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';

</style>
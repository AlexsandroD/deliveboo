<template>
    <div>
        <Categories />
        <Restaurants />
        <News />
        <WorkWith />

    </div>
</template>

<script>
import Categories from '../sections/Categories.vue';
import Restaurants from '../sections/Restaurants.vue';
import News from '../sections/News.vue';
import WorkWith from '../sections/WorkWith.vue';

export default {
    name: 'Home',
    components:{

        Categories,
        Restaurants,
        News,
        WorkWith,

        
    }
}
</script>

<style>

</style>
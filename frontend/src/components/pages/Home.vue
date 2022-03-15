<template>
    <div>
        <Categories />
        <Restaurants />
    </div>
</template>

<script>
import Categories from '../sections/Categories.vue';
import Restaurants from '../sections/Restaurants.vue';

export default {
    name: 'Home',
    components:{

        Categories,
        Restaurants,
    }
}
</script>

<style>

</style>
<template>
    <div>
        <Hero/>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 mt-sm-5 mb-sm3">
                    <Categories />
                </div>
                <div class="col-12 col-lg-9 mt-lg-5 mb-sm-3">
                    <Restaurants />
                </div>
                <div class="col">
                  <News />
                  <WorkWith />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Hero from "../sections/Hero.vue";
import Categories from '../sections/Categories.vue';
import Restaurants from '../sections/Restaurants.vue';
import News from '../sections/News.vue';
import WorkWith from '../sections/WorkWith.vue';

export default {
    name: 'Home',
    components:{
        Hero,
        Categories,
        Restaurants,
        News,
        WorkWith,
    },
  // created(){
  //   window.scrollTo({ top: 0, behavior: 'smooth' });
  // }
}
</script>

<style lang="scss" scoped>

.ms_max-width {
    max-width: 1800px;
}

</style>
<template>
  <div class="container">
      <!-- parte dati ristorante -->
    



      <!-- lista piatti  -->

      <div class="row">
        <div class="col" v-for="dish in restaurant.dishes" :key="dish.id">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{dish.name}}</h5>
              <img v-if="dish.image" :src="'http://127.0.0.1:8000/storage/'+dish.image" :alt="dish.name">
              <img v-else src="https://images.prismic.io/dbhq-deliveroo-riders-website/748bbe8d-ef6f-4f0c-8fda-1bed4928b9eb_hero%402x.png?auto=compress,format" :alt="dish.name">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
      </div>

  </div>
</template>

<script>
export default {
    name:"RestaurantMenu",
    data(){
      return{
        restaurant:{},
      }
    },
    created(){
      const axios = require('axios').default;
            axios.get(`http://127.0.0.1:8000/api/restaurants/${this.$route.params.slug}`)
            .then((response) => {
            this.restaurant = response.data;
    })
}}
</script>

<style>

</style>
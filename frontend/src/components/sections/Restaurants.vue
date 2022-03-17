<template>
  <div class="container">
      <div class="row">
          <div class="col" v-for="restaurant in restaurants" :key="restaurant.id">
            <router-link :to="{ name: 'restaurant-menu', params: { slug:restaurant.slug } }">
                <div class="card">
                <img v-if="restaurant.image_cover" class="card-img-top"  :src="'http://127.0.0.1:8000/storage/' + restaurant.image_cover" style="width:200px" :alt="restaurant.name">
                <img v-else src="https://www.wecanjob.it/moduli/output_immagine.php?id=8444"  style="width:200px" :alt="restaurant.name">
                    <div class="card-body">
                        <h5 class="card-title">{{ restaurant.name }}</h5>
                        <p class="card-text">{{ restaurant.phone }}</p>
                    </div>
                </div>
            </router-link>
          </div>
      </div>
  </div>
</template>

<script>
import variables from "../../variables";
export default {
    name:"Restaurants",
    data(){
        return{
            variables,
            restaurants:[],

        }
    },
    created(){
       if (this.variables.categoriesValue.length > 0) {
            this.restaurantsFilter();
        } else {
            this.getRestaurant();
        }
    },

    methods:{
        getRestaurant(){

            const axios = require('axios').default;
            axios.get('http://127.0.0.1:8000/api/restaurants')
            .then((response) => {
                this.restaurants = response.data;

        })
        },

        restaurantsFilter(){

            const axios = require('axios').default;
            axios.get('http://127.0.0.1:8000/api/filters',{
                params:{
                    categories: this.variables.categoriesValue,
                }  
            })
            .then((response) => {
                this.restaurants = response.data;
            }) 
        },

    
    },

    watch: {
        'variables.categoriesValue'() {
            if (this.variables.categoriesValue.length > 0) {
                this.restaurantsFilter();
            } else {
                this.getRestaurant();
            }
        }
    }

}

</script>

<style>

</style>
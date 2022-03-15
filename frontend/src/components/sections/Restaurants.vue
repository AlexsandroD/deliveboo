<template>
  <div class="container">
      <div class="row">
          <div class="col" v-for="restaurant in restaurants" :key="restaurant.id">
            <router-link :to="{ name: 'restaurant-menu', params: { slug:restaurant.slug } }">
                <div class="card">
                <img class="card-img-top" src="" alt="Card image cap">
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
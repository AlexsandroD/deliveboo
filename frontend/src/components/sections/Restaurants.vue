<template>
  <div class="container">
      <button @click="restaurantsFilter()">KTM</button>
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
       this.getRestaurant();
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

    
    }

}

</script>

<style>

</style>
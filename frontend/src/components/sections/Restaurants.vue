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
      <div class="row">
          <div class="overflow-auto">
            <div class="mt-3">
            <b-pagination
                v-model="variables.page"
                :total-rows='variables.totalPage'
                :per-page="1"
                first-number
                last-number
            ></b-pagination>
            </div>
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
       this.variables.page = 1;
       if (this.variables.categoriesValue.length > 0) {
            this.restaurantsFilter();
        } else {
            this.getRestaurant();
        }
      
    },

  

    methods:{
        getRestaurant(){

            const axios = require('axios').default;
            axios.get(`http://127.0.0.1:8000/api/restaurants?page=${this.variables.page}`)
            .then((response) => {
                this.restaurants = response.data.data;
                this.variables.totalPage = response.data.last_page;
             })
        },

        restaurantsFilter(){

            const axios = require('axios').default;
            axios.get('http://127.0.0.1:8000/api/filters',{
                params:{
                    categories: this.variables.categoriesValue,
                    page:this.variables.page,
                } 
            })
            .then((response) => {
                this.restaurants = response.data.data;
            }) 
        },

    
    },

    watch: {
        'variables.categoriesValue'() {
            this.variables.page = 1;
            if (this.variables.categoriesValue.length > 0) {
                this.restaurantsFilter();
            } else {
                this.getRestaurant();
            }
        },
        'variables.page'(){
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
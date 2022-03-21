<template>
  <div class="container">
      <div class="row row-cols-5">
          <CardRestaurant v-for="restaurant in restaurants" :key="restaurant.id" :restaurant="restaurant" />
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
import CardRestaurant from "../micro/CardRestaurant";
import variables from "../../variables";


export default {
    name:"Restaurants",
    components:{
        CardRestaurant,

    },
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

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';




</style>
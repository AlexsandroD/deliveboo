<template>
  <div class="container">
      <div class="row row-cols-5">
          <div class="col  my-2" v-for="restaurant in restaurants" :key="restaurant.id">
              
            <router-link class="link" :to="{ name: 'restaurant-menu', params: { slug:restaurant.slug } }">
                <!-- <div class="card my-2 d-flex align-items-stretch">
                <img v-if="restaurant.image_cover" class="card-img-top"  :src="'http://127.0.0.1:8000/storage/' + restaurant.image_cover"  :alt="restaurant.name">
                <img v-else src="https://www.wecanjob.it/moduli/output_immagine.php?id=8444"   :alt="restaurant.name">
                    <div class="card-body">
                        <h5 class="card-title">{{ restaurant.name }}</h5>
                        <p>{{restaurant.email}}</p>
                        <p class="card-text">{{ restaurant.phone }}</p>
                    </div>
                </div> -->
                <div class="card h-100">
                    <div class="overflow-hidden img-wrapper">
                        <img v-if="restaurant.image_cover" class="card-img-top my_class"  :src="'http://127.0.0.1:8000/storage/' + restaurant.image_cover"  :alt="restaurant.name">
                        <img v-else src="https://www.wecanjob.it/moduli/output_immagine.php?id=8444" class="card-img-top my_class" :alt="restaurant.name">
                    </div>
                    <div class="mcard-body">
                        <h5 class="card-title fw-bold">{{ restaurant.name }}</h5>
                        <p>{{restaurant.address}}</p>
                        <p class="card-text">{{ restaurant.number }}</p>
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

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';

.link{
    text-decoration:none;
    color: black; 
    img{
        width: 100%;
    }
}

.card{
    min-height:300px;
    transition: 0.2s;
}

.card:hover{
-webkit-box-shadow: 5px 5px 6px -1px rgba(0,0,0,0.4); 
box-shadow: 5px 5px 6px -1px rgba(0,0,0,0.4);
    transform: scale(1.0, 1.1);
}

img{
    transition:ease 0.3s;
}

 .card:hover img{
    transform:scale(
        1.5
    )
}


</style>
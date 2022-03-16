<template>
  <div class="container">
      <!-- parte dati ristorante -->
    



      <!-- lista piatti  -->

      <div class="row">
        <div class="col" v-for="dish in restaurant.dishes" :key="dish.id">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{dish.name}}</h5>
              <!-- <img v-if="dish.image" :src="'http://127.0.0.1:8000/storage/'+dish.image" :alt="dish.name">
              <img v-else src="https://images.prismic.io/dbhq-deliveroo-riders-website/748bbe8d-ef6f-4f0c-8fda-1bed4928b9eb_hero%402x.png?auto=compress,format" :alt="dish.name"> -->
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <button @click="removeCartItem(dish.id)">meno</button>

              <span>{{cart.filter(e => e.dishId == dish.id).length > 0 ? cart.find(x => x.dishId == dish.id).quantity : 0}}</span>
              <button @click="addCartItem(dish.id)">piú</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
            <h3>Carrello</h3>
            <p></p>

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
        cart:[],

         
      }
    },

    created(){
      const axios = require('axios').default;
            axios.get(`http://127.0.0.1:8000/api/restaurants/${this.$route.params.slug}`)
            .then((response) => {
            this.restaurant = response.data;
            })
    },

    mounted(){
      this.cart = JSON.parse(localStorage.getItem('cart'));
    },

    methods:{
      addCartItem(dishId){
        if(this.cart.length < 1){
          localStorage.setItem('restaurantId',this.restaurant.id);
        }
        if (this.cart.filter(e => e.dishId === dishId).length > 0) {
          let objIndex = this.cart.findIndex((obj => obj.dishId == dishId));
          this.cart[objIndex].quantity += 1;
        }else{
          let dish = {
            'dishId' : dishId,
            'quantity': 1,
          }
          this.cart.push(dish);
        }

        localStorage.setItem('cart', JSON.stringify(this.cart));
        
      },
      removeCartItem(dishId){
          if (this.cart.filter(e => e.dishId === dishId).length > 0) {
          
            let objIndex = this.cart.findIndex((obj => obj.dishId == dishId));
          

            if(this.cart[objIndex].quantity > 1){
              this.cart[objIndex].quantity -= 1;
            }else{
              this.cart.splice(objIndex,1);
            }
          }

          localStorage.setItem('cart', JSON.stringify(this.cart));

          if(this.cart.length < 1){
            localStorage.removeItem('restaurantId');
          }
      },

    }
}
</script>

<style>

</style>
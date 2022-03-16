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
              <span v-if="cart != null">{{cart.filter(e => e.dishId == dish.id).length > 0 ? cart.find(x => x.dishId == dish.id).quantity : 0}}</span>
              <span v-else>0</span>
              <button @click="addCartItem(dish.id,dish.name,dish.price)">piú</button>
            </div>
          </div>
        </div>
      </div>
    
        <!-- modale cart  -->
        <div id="app">
          <div v-if="cartError">
            <transition name="modal">
              <div class="modal-mask">
                <div class="modal-wrapper">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" @click="cartError=false" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>Modal body text goes here.</p>
                      </div>
                      <div class="modal-footer">
                       <router-link :to="{ name: 'restaurant-menu', params: { slug:storageSlug } }">
                        <button type="button" class="btn btn-secondary" @click="cartError = false">Torna al Ristorante</button>
                       </router-link>
                        <button type="button" class="btn btn-primary" @click="emptyCart()">Svuota carrello</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </transition>
        </div>
      </div>

        <!-- /// modale cart  -->

        <!-- cart  -->
          <Cart />
        <!-- // cart  -->
  </div>
</template>

<script>
import Cart from '../sections/Cart.vue';
import variables from '../../variables';
export default {
    name:"RestaurantMenu",
    components:{
      Cart,
    },
    data(){
      return{
        restaurant:{},
        cart:[],
        cartError:false,
        storageSlug:null,
        variables,
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
      if(localStorage.getItem('cart') != null){
        this.cart = JSON.parse(localStorage.getItem('cart'));
        this.storageSlug=localStorage.getItem('restaurantSlug');
      }

    },

   

    methods:{
      addCartItem(dishId,dishName,dishPrice){
        if(this.cart.length < 1){
          localStorage.setItem('restaurantId',this.restaurant.id);
          localStorage.setItem('restaurantSlug', this.restaurant.slug);
          localStorage.setItem('restaurantName', this.restaurant.name);
          

        }
        if(this.restaurant.id == localStorage.getItem('restaurantId') ){

          if (this.cart.filter(e => e.dishId === dishId).length > 0) {
            let objIndex = this.cart.findIndex((obj => obj.dishId == dishId));
            this.cart[objIndex].quantity += 1;
          }else{
            let dish = {
              'dishId' : dishId,
              'quantity': 1,
              'name': dishName,
              'dishPrice':dishPrice,
            }
            this.cart.push(dish);
          }
  
          localStorage.setItem('cart', JSON.stringify(this.cart));
          
        }else{
          this.cartError = true;
        }
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
            localStorage.removeItem('restaurantSlug');
            localStorage.removeItem('restaurantName');
          }
      },

      emptyCart(){
        this.cart=[];
        localStorage.clear();
        this.cartError = false;
      }

    }
}
</script>

<style lang="scss" scoped>
  .modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
  }

  .modal-wrapper {
    display: table-cell;
    vertical-align: middle;
  }
</style>
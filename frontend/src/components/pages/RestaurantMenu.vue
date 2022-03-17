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
              <button @click="cartLogic.removeCartItem(dish.id)">meno</button>
              <span v-if="cartLogic.cart != null">{{cartLogic.cart.filter(e => e.dishId == dish.id).length > 0 ? cartLogic.cart.find(x => x.dishId == dish.id).quantity : 0}}</span>
              <span v-else>0</span>
              <button @click="cartLogic.addCartItem(dish.id,dish.name,dish.price,restaurant.id,restaurant.slug,restaurant.name)">piú</button>
            </div>
          </div>
        </div>
      </div>
    
        <!-- modale cart  -->
        <div id="app">
          <div v-if="cartLogic.cartError">
            <transition name="modal">
              <div class="modal-mask">
                <div class="modal-wrapper">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" @click="cartLogic.cartError=false" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>Modal body text goes here.</p>
                      </div>
                      <div class="modal-footer">
                       <router-link :to="{ name: 'restaurant-menu', params: { slug:cartLogic.restaurantSlug } }">
                        <button type="button" class="btn btn-secondary" @click="cartLogic.cartError = false">Torna al Ristorante</button>
                       </router-link>
                        <button type="button" class="btn btn-primary" @click="cartLogic.emptyCart()">Svuota carrello</button>
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
import cartLogic from '../../cartLogic';

export default {
    name:"RestaurantMenu",
    components:{
      Cart,
    },
    data(){
      return{
        restaurant:{},
        cartLogic,
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
      this.cartLogic.mountedCart();
    },

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
<template>
  <div class="container">
    
      <!-- parte dati ristorante -->
      <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img v-if="restaurant.image_cover" class="card-img-top"  :src="'http://127.0.0.1:8000/storage/' + restaurant.image_cover" style="width:200px" :alt="restaurant.name">
              <img v-else src="https://www.wecanjob.it/moduli/output_immagine.php?id=8444"  style="width:200px" :alt="restaurant.name">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{restaurant.name}}</h5>
                <p class="card-text">{{ restaurant.description }}</p>
                <p class="card-text">{{ restaurant.email }}</p>
                <p class="card-text">{{ restaurant.address}}, {{ restaurant.city }}, {{ restaurant.post_code }}, {{ restaurant.country}}</p>
                <p class="card-text">{{ restaurant.phone }}</p>
              </div>
            </div>
          </div>
      </div>



      <!-- lista piatti  -->

      <div class="row">
        <div class="col" v-for="dish in restaurant.dishes" :key="dish.id">
          <div v-if="dish.visible" class="card"  style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{dish.name}}</h5>
              <img v-if="dish.image" class="card-img-top"  :src="'http://127.0.0.1:8000/storage/' + dish.image" style="width:200px" :alt="dish.name">
              <img v-else src="https://www.wecanjob.it/moduli/output_immagine.php?id=8444"  style="width:200px" :alt="dish.name">
              <p class="card-text">{{ dish.description }}</p>
              <p class="card-text">&euro;{{ dish.price }}</p>
              <button @click="cartLogic.removeCartItem(dish.id)">meno</button>
              <span v-if="cartLogic.cart != null">{{cartLogic.cart.filter(e => e.dishId == dish.id).length > 0 ? cartLogic.cart.find(x => x.dishId == dish.id).quantity : 0}}</span>
              <span v-else>0</span>
              <button @click="cartLogic.addCartItem(dish.id,dish.name,dish.price,restaurant.id,restaurant.slug,restaurant.name)">piú</button>
            </div>
          </div>
           <div v-else class="card" disabled  style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{dish.name}}</h5>
              <img v-if="dish.image" class="card-img-top"  :src="'http://127.0.0.1:8000/storage/' + dish.image" style="width:200px" :alt="dish.name">
              <img v-else src="https://www.wecanjob.it/moduli/output_immagine.php?id=8444"  style="width:200px" :alt="dish.name">
              <p class="card-text">{{ dish.description }}</p>
              <p>Terminato</p>
            </div>
          </div>
        </div>
      </div>
    
        <!-- modale cart  -->
          <div v-if="cartLogic.cartError">
            <transition name="modal">
              <div class="modal-mask">
                <div class="modal-wrapper">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Vuoi creare un nuovo carrello?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" @click="cartLogic.cartError=false" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>Il carrello già esistente da <strong>{{cartLogic.restaurantName}}</strong> verrà eliminato.</p>
                      </div>
                      <div class="modal-footer">
                       <router-link :to="{ name: 'restaurant-menu', params: { slug:cartLogic.restaurantSlug } }">
                        <button type="button" class="btn btn-secondary" @click="cartLogic.cartError = false">Vai al carrello</button>
                       </router-link>
                        <button type="button" class="btn btn-primary" @click="cartLogic.emptyCart()">Svuota carrello</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </transition>
        </div>

        <!-- /// modale cart  -->

        <router-link :to="{ name: 'home'}">
            <button type="button" class="btn btn-secondary">Torna all'elenco Ristoranti</button>
        </router-link>


        <!-- cart  -->
          <Cart />
        <!-- // cart  -->
  </div>
</template>

<script>
import Cart from '../sections/Cart.vue';
import cartLogic from "../../cartLogic";

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
            this.cartLogic.newRestaurantId = this.restaurant.id; 
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
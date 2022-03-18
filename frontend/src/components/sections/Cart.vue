<template>
  <div class="div">
      <h2>Carrello</h2>
      <p v-if="cartLogic.restaurantId == cartLogic.newRestaurantId">{{cartLogic.restaurantName}}</p>
      <ul v-if="cartLogic.restaurantId == cartLogic.newRestaurantId">
          <li v-for='dish in cartLogic.cart' :key='dish.dishId'>
              <div>
                {{ dish.name }} 
                <button @click="cartLogic.removeCartItem(dish.dishId)">-</button>
                <span>{{ dish.quantity }}</span>
                <button @click="cartLogic.addCartItem(dish.dishId,dish.name,dish.price,cartLogic.restaurantId,cartLogic.restaurantSlug,cartLogic.restaurantName)">+</button>
              </div>
              {{ returnDishTotal(dish.dishPrice,dish.quantity) }}
          </li>
      </ul>
      <button v-if="cartLogic.restaurantId == cartLogic.newRestaurantId || cartLogic.cart.length > 0" @click="cartLogic.emptyCart()">Svuota carrello</button>
      <p v-if="cartLogic.restaurantId == cartLogic.newRestaurantId">totale:{{cartLogic.totalPrice}}</p>
      <p v-else>carrello vuoto</p>
      <Checkout />
  </div>
</template>

<script>
import Checkout from "./Checkout.vue";
import cartLogic from "../../cartLogic";
export default {
    name:'Cart',
    components:{
        Checkout,
    },
    data(){
        return{
            cartLogic,
        }
    },


    methods:{
        returnDishTotal(price,quantity){
        console.log(price,quantity);
          return  (price * quantity).toFixed(2);
        },

    }
  
    
}
</script>

<style>

</style>
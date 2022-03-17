<template>
  <div class="div">
      <h2>Carrello</h2>
      <p v-if="cartLogic.restaurantId == cartLogic.newRestaurantId">{{cartLogic.restaurantName}}</p>
      <ul v-if="cartLogic.restaurantId == cartLogic.newRestaurantId">
          <li v-for='dish in cartLogic.cart' :key='dish.dishId'>
              {{ dish.name }}
              {{ returnDishTotal(dish.dishPrice,dish.quantity) }}
          </li>
      </ul>
      <p v-if="cartLogic.restaurantId == cartLogic.newRestaurantId">totale:{{returnTotal()}}</p>
      <p v-else>carrello vuoto</p>
  </div>
</template>

<script>
import cartLogic from "../../cartLogic";
export default {
    name:'Cart',
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

        returnTotal(){
            let cartTotal = 0;
            for(let i = 0; i < this.cartLogic.cart.length; i++){
              cartTotal += (this.cartLogic.cart[i].dishPrice *  this.cartLogic.cart[i].quantity);            
            }
            this.cartLogic.totalPrice = cartTotal.toFixed(2);
            return cartTotal.toFixed(2);
        }
    }
  
    
}
</script>

<style>

</style>
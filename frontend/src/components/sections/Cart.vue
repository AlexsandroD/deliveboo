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
      <p v-if="cartLogic.qtyError">Il totale massimo consentito deve essere inferiore 9999.99</p>

        <!-- pagamento -->
        <div>
            <b-button v-b-modal.payment-modal ok-disabled.false v-if="cartLogic.restaurantId == cartLogic.newRestaurantId || cartLogic.cart.length > 0">Paga</b-button>

            <b-modal id="payment-modal" size="lg">
                <template #modal-header="{ close }">
                    <h5>Procedi con il pagamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="close()"></button>
                </template>

                <template #default>
                    <Checkout/>
                </template>

                <template #modal-footer="{ cancel }">
                    <b-button size="sm" variant="danger" @click="cancel()">
                        Chiudi
                    </b-button>
                </template>
            </b-modal>
        </div>
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
          return  (price * quantity).toFixed(2);
        },

    }
  
    
}
</script>

<style>

</style>
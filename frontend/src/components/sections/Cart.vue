<template>
  <div class="cart">
    <h2>Il tuo Carrello</h2>
    <h5 v-if="cartLogic.restaurantId == cartLogic.newRestaurantId">
      {{ cartLogic.restaurantName }}
    </h5>
    <ul v-if="cartLogic.restaurantId == cartLogic.newRestaurantId">
      <li v-for="dish in cartLogic.cart" :key="dish.dishId">
        <div>
          <span class="my-2">
            {{ dish.name }}
          </span>
          <a @click="cartLogic.removeCartItem(dish.dishId)"
            ><i class="fa-solid fa-minus"></i
          ></a>
          <span class="m-2">{{ dish.quantity }}</span>
          <a
            @click="
              cartLogic.addCartItem(
                dish.dishId,
                dish.name,
                dish.price,
                cartLogic.restaurantId,
                cartLogic.restaurantSlug,
                cartLogic.restaurantName
              )
            "
          >
            <i class="fa-solid fa-plus"></i>
          </a>
        </div>

        {{ returnDishTotal(dish.dishPrice, dish.quantity) }}
      </li>
    </ul>
    <button
      type="button"
      class="btn btn-success p-1 my-3"
      v-if="
        cartLogic.restaurantId == cartLogic.newRestaurantId &&
        cartLogic.cart.length > 0
      "
      @click="cartLogic.emptyCart()"
    >
      Svuota carrello
    </button>
    <p v-if="cartLogic.restaurantId == cartLogic.newRestaurantId">
      totale:{{ cartLogic.totalPrice }}
    </p>

    <span v-else>icona carrello</span>
    <p v-if="cartLogic.qtyError">
      Il totale massimo consentito deve essere inferiore 9999.99
    </p>

    <div
      v-if="
        cartLogic.restaurantId == cartLogic.newRestaurantId &&
        cartLogic.cart.length > 0
      "
    >
      <!-- pagamento -->
      <b-button
        type="button"
        class="btn btn-primary p-3 my-3"
        v-b-modal.payment-modal
        ok-disabled.false
        >Paga</b-button
      >

      <b-modal id="payment-modal" size="lg">
        <template #modal-header="{ close }">
          <h5>Procedi con il pagamento</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            @click="close()"
          ></button>
        </template>

        <template #default>
          <Checkout />
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
  name: "Cart",
  components: {
    Checkout,
  },
  data() {
    return {
      cartLogic,
    };
  },

  methods: {
    returnDishTotal(price, quantity) {
      return (price * quantity).toFixed(2);
    },
  },
};
</script>

<style lang = "scss" scoped>
@import "../../assets/style/global.scss";
.cart {
  ul {
    li {
      list-style: none;
    }
  }
}
</style>
<template>
  <div class="info_container">
    <!-- nome ristorante -->
    <h4 class="mb-0" v-if="cartLogic.restaurantId == cartLogic.newRestaurantId">
      {{ cartLogic.restaurantName }}
    </h4>

    <!-- lista piatti -->
    <ul
      class="dish_list"
      v-if="cartLogic.restaurantId == cartLogic.newRestaurantId"
    >
      <li class="dish py-3" v-for="dish in cartLogic.cart" :key="dish.dishId">
        <div class="d-flex justify-content-between">
          <h6 class="pe-2">
            <span class="dish_quantity">{{ dish.quantity }}</span>
            {{ dish.name }}
          </h6>
          <span>
            &euro;{{ returnDishTotal(dish.dishPrice, dish.quantity) }}
          </span>
        </div>
        <div class="buttons d-flex">
          <button
            class="
              btn_add_minum
              d-flex
              justify-content-center
              align-items-center
            "
            @click="cartLogic.removeCartItem(dish.dishId)"
          >
            <i class="fa-solid fa-minus"></i>
          </button>
          <button
            class="
              btn_add_minum
              d-flex
              justify-content-center
              align-items-center
              ms-2
            "
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
          </button>
        </div>
      </li>
    </ul>

    <!-- totale piatti -->
    <div
      class="order_total text-end mb-4"
      v-if="
        cartLogic.restaurantId == cartLogic.newRestaurantId &&
        cartLogic.cart.length > 0
      "
    >
      Totale &euro;{{ cartLogic.totalPrice }}
    </div>
    <!-- <h4 class="empty_cart" v-else>Non hai ancora aggiunto piatti</h4> -->
    <div v-else class="my_display">
      <img src="../../assets/images/cards/download.png" alt="carrello vuoto" />
    </div>

    <!-- svuota carrello -->
    <div class="d-flex justify-content-end">
      <button
        class="btn btn_logout"
        v-if="
          cartLogic.restaurantId == cartLogic.newRestaurantId &&
          cartLogic.cart.length > 0
        "
        @click="cartLogic.emptyCart()"
      >
        Svuota carrello
      </button>

      <!-- pagamento -->
      <button
        class="btn ms-2 btn_filled"
        v-b-modal.payment-modal
        ok-disabled.false
        v-if="
          cartLogic.restaurantId == cartLogic.newRestaurantId &&
          cartLogic.cart.length > 0
        "
      >
        Paga
      </button>
      <Checkout />
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

<style lang="scss" scoped>
@import "../../assets/style/variables.scss";
@import "../../assets/style/buttons.scss";

.info_container {
  padding: 1.4rem 2rem;
  border-bottom-left-radius: 0.4rem;
  border-bottom-right-radius: 0.4rem;

  h4 {
    padding: 0 0 0.8rem;
  }

  .empty_cart {
    font-size: 1.4rem;
    color: $_darkGrey;

    margin: 0;
  }

  ul.dish_list {
    max-height: 20rem;
    overflow-y: scroll;
    list-style: none;

    padding: 0;

    li.dish {
      border-bottom: 1px solid lightgrey;

      h6 {
        .dish_quantity {
          font-size: 1.1rem;
          font-weight: 900;

          color: $_primary;
        }
      }

      .buttons {
        .btn_add_minum {
          width: 1.6rem;
          height: 1.6rem;

          background-color: $_primary;
          color: $_white;

          border-radius: 50%;
          border: none;

          transition: 0.2s linear;

          &:hover {
            background-color: $_darkerPrimaryHover;
          }

          &:active {
            transform: scale(1.2);
          }
        }
      }
    }
  }

  .order_total {
    font-weight: 900;
    color: $_primary;
  }
}

//00000000 MEDIA QUERIES 00000000
@media (min-width: 768px) {
}

.my_display {
  display: grid;
  place-items: center;
  width: 100%;

  img {
    width: 70%;
    object-fit: cover;
  }
}
</style>
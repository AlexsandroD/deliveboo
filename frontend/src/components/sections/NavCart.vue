<template>
  <div class="dropdown_container">
    <h2>Il tuo Carrello</h2>

    <div class="info_container">
      <!-- nome ristorante -->
      <h4 v-if="cartLogic.restaurantId == cartLogic.newRestaurantId">
        {{ cartLogic.restaurantName }}
      </h4>

      <!-- lista piatti -->
      <ul
        class="dish_list"
        v-if="cartLogic.restaurantId == cartLogic.newRestaurantId"
      >
        <li class="dish" v-for="dish in cartLogic.cart" :key="dish.dishId">
          <div class="d-flex justify-content-between">
            <h6>
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
        class="order_total text-end"
        v-if="cartLogic.restaurantId == cartLogic.newRestaurantId"
      >
        Totale &euro;{{ cartLogic.totalPrice }}
      </div>
      <p class="empty_cart" v-else>Non hai ancora aggiunto piatti</p>

      <!-- svuota carrello -->
      <div class="d-flex justify-content-end mt-4">
        <button
          class="btn btn_logout"
          v-if="
            cartLogic.restaurantId == cartLogic.newRestaurantId ||
            cartLogic.cart.length > 0
          "
          @click="cartLogic.emptyCart()"
        >
          Svuota carrello
        </button>

        <!-- errore totale -->
        <!-- <p v-if="cartLogic.qtyError">
          Il totale massimo consentito deve essere inferiore 9999.99
        </p> -->

        <!-- pagamento -->
        <button
          class="btn ms-2 btn_filled"
          v-b-modal.payment-modal
          ok-disabled.false
          v-if="
            cartLogic.restaurantId == cartLogic.newRestaurantId ||
            cartLogic.cart.length > 0
          "
        >
          Paga
        </button>

        <Checkout />
      </div>
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

.dropdown_container {
  background-color: $_white;

  border-radius: 0.4rem;

  h2 {
    background-color: $_primary;
    color: $_white;

    margin: 0;
    padding: 1rem 2rem;
    border-top-left-radius: 0.4rem;
    border-top-right-radius: 0.4rem;
  }

  .info_container {
    padding: 0rem 2rem 1.4rem;

    h4 {
      padding: 1.4rem 0 0.8rem;
    }

    .empty_cart {
      margin: 0;
      padding-top: 1.4rem;
    }

    ul.dish_list {
      list-style: none;

      padding: 0;

      li.dish {
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
}
</style>
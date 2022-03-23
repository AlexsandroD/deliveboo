<template>
  <div class="my_card card h-100 my-4 mb-4">
    <div class="card-header my_header py-3">
      <h5 class="my_text text-center"><i class="fas fa-shopping-cart"></i></h5>
    </div>

    <div
      class="card-body p-2"
      v-if="cartLogic.restaurantId == cartLogic.newRestaurantId"
    >
      <ul class="list-group list-group-flush">
        <li
          class="
            list-group-item
            d-flex
            justify-content-between
            align-items-center
            border-0
            px-0
            pb-0
            my-3
          "
        >
          <span class="fw-bold">{{ cartLogic.restaurantName }}</span>
        </li>
        <li
          v-for="dish in cartLogic.cart"
          :key="dish.dishId"
          class="list-group-item d-flex justify-content-between px-0 my-2"
        >
          <div class="row d-flex justify-content-between w-100">
            <div class="col-12 col-lg-9">
              <div class="row row-cols-1 row-cols-lg-2">
                <div class="col">
                  <span class="">{{ dish.quantity }}</span> X
                  {{ dish.name }}
                </div>
                <div class="col">
                  <a class="my_button" @click="cartLogic.removeCartItem(dish.dishId)"
                    ><i class="fa-solid fa-minus"></i>
                  </a>
                  <a class="my_button"
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
              </div>
            </div>
            <span id="price_item" class="col-12 col-lg-3"
              >&euro; {{ returnDishTotal(dish.dishPrice, dish.quantity) }}</span
            >
          </div>
        </li>
      </ul>

      <button
        type="button"
        class="my_btn btn btn-success p-2 my-3"
        v-if="
          cartLogic.restaurantId == cartLogic.newRestaurantId &&
          cartLogic.cart.length > 0
        "
        @click="cartLogic.emptyCart()"
      >
        Svuota carrello
      </button>
      <p
        class="fw-bold d-flex justify-content-between"
        v-if="cartLogic.restaurantId == cartLogic.newRestaurantId"
      >
        <span>totale:</span><span>&euro; {{ cartLogic.totalPrice }}</span>
      </p>
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
    <div class="card-body" v-else>
      <!-- <div class="box">
        <div class="wrapper">
          <div class="inner-box-1">
            <div class="left" :style="left" />
          </div>
          <div class="inner-box-2">
            <div class="right" :style="right" />
          </div>
        </div>
      </div> -->
    </div>
    <b-button
      v-if="
        cartLogic.restaurantId == cartLogic.newRestaurantId &&
        cartLogic.cart.length > 0
      "
      type="button"
      class="my_payment btn btn-primary p-2"
      v-b-modal.payment-modal
      ok-disabled.false
      >Paga</b-button
    >
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
      x: 0,
      y: 0,
      viewportHeight: 1,
      viewportWidth: 1,
    };
  },

  created() {
    this.updateViewportSize();
  },

  mounted() {
    document.addEventListener("mousemove", this.onMouseMove);
    window.addEventListener("resize", this.updateViewportSize);
  },

  unmounted() {
    document.removeEventListener("mousemove", this.onMouseMove);
    window.removeEventListener("resize", this.updateViewportSize);
  },

  computed: {
    left() {
      return {
        left: percent(this.x, this.viewportWidth),
        top: percent(this.y, this.viewportHeight),
      };

      function percent(value, total) {
        return Math.round((value * 60) / total) + "%";
      }
    },
    right() {
      return {
        left: percent(this.x, this.viewportWidth),
        top: percent(this.y, this.viewportHeight),
      };

      function percent(value, total) {
        return Math.round((value * 60) / total) + "%";
      }
    },
  },

  methods: {
    returnDishTotal(price, quantity) {
      return (price * quantity).toFixed(2);
    },

    onMouseMove(ev) {
      this.x = ev.clientX;
      this.y = ev.clientY;
    },

    updateViewportSize() {
      this.viewportHeight = window.innerHeight;
      this.viewportWidth = window.innerWidth;
    },
  },
};
</script>

<style lang = "scss" scoped>
@import "../../assets/style/global.scss";
img {
  object-fit: cover;
}

.my_card {
  border-radius: 0.4rem;
}

.my_btn {
  background-color: $_primary !important;
  border: none !important;
  &:hover {
    background-color: $_darkerPrimaryHover !important;
  }
}

.my_header {
  background-color: $_primary !important;
  color: white;
  border: none !important;
  border-radius: 0.4rem;
}
.my_payment {
  background-color: $_darkGrey !important;
  border: none !important;
  width: 100% !important;
  border-radius: 0.4rem;
}

/* animation section  */

.box {
  width: 100%;
  height: 50px;
  position: relative;
}
.wrapper {
}

.inner-box-1 {
  background-color: #fafafa;
  width: 50px;
  height: 50px;
  border-radius: 40%;
  position: absolute;
  top: 0;
  bottom: 0px;
  left: 40%;
  right: 50%;
  padding: 15px;
  margin: 0 20px;
  border: solid 1px black;
}
.inner-box-2 {
  background-color: #fafafa;
  width: 50px;
  height: 50px;
  border-radius: 40%;
  position: absolute;
  top: 0;
  bottom: 10px;
  left: 10%;
  right: 10%;
  padding: 15px;
  margin: 0 20px;
  border: solid 1px black;
}

.left {
  background: $_primary;
  border-radius: 50%;
  position: absolute;
  border: solid 1px black;

  height: 20px;
  width: 20px;
}
.right {
  background: $_primary;
  border-radius: 50%;
  border: solid 1px black;
  position: absolute;
  height: 20px;
  width: 20px;
}

.my_button{
  wid
}
</style>
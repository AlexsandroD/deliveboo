<template>
  <div v-if="dish.visible" class="card h-100 p-2">
    <div class="row h-100">
      <div class="col-6">
        <div class="card-block h-100 p-1 text-start">
          <!--           <h4 class="card-title">Small card</h4> -->
          <h4 class="my-2">{{ dish.name }}</h4>
          <p>{{ dish.description }}</p>
          <div class="row my-2 d-flex align-items-center">
            <div class="col-5">
              <p class="fw-bold">&euro; {{ dish.price }}</p>
            </div>
            <div class="col-6">
              <div class="qty d-flex">
                <span
                  class="my_minus"
                  @click="cartLogic.removeCartItem(dish.id)"
                  >-</span
                >
                <span
                  class="count px-1"
                  name="qty"
                  v-if="cartLogic.cart != null"
                  >{{
                    cartLogic.cart.filter((e) => e.dishId == dish.id).length > 0
                      ? cartLogic.cart.find((x) => x.dishId == dish.id).quantity
                      : 0
                  }}</span
                >
                <span class="count" name="qty" v-else>0</span>
                <span
                  class="my_plus"
                  @click="
                    cartLogic.addCartItem(
                      dish.id,
                      dish.name,
                      dish.price,
                      restaurant.id,
                      restaurant.slug,
                      restaurant.name
                    )
                  "
                  >+</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="my_img_container h-100">
          <img
            class="h-100"
            v-if="dish.image"
            :src="'http://127.0.0.1:8000/storage/' + dish.image"
            :alt="dish.name"
          />
          <img
            class="h-100"
            v-else
            src="../../assets/images/bg/placeholder.svg"
            :alt="dish.name"
          />
        </div>
      </div>
    </div>
  </div>
  <div v-else class="card h-100" disabled>
    <div class="row h-100">
      <div class="col-6">
        <div class="card-block h-100 p-3">
          <!--           <h4 class="card-title">Small card</h4> -->
          <h4 class="my-2">{{ dish.name }}</h4>
          <p>&euro; {{ dish.price }}</p>
          <p>Prodotto esaurito</p>
        </div>
      </div>
      <div class="col-6">
        <div class="my_img_container h-100">
          <img
            class="h-100"
            v-if="dish.image"
            :src="'http://127.0.0.1:8000/storage/' + dish.image"
            :alt="dish.name"
          />
          <img
            class="h-100"
            v-else
            src="../../assets/images/bg/placeholder.svg"
            :alt="dish.name"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import cartLogic from "../../cartLogic";
export default {
  name: "CardDish",
  props: {
    dish: {},
    restaurant: {},
  },
  data() {
    return {
      cartLogic,
    };
  },
};
</script>

<style lang = "scss" scoped>
@import "../../assets/style/global.scss";
.my_img_container {
  overflow: hidden;
  width: 100%;
  height: 100%;
}
img {
  width: 100%;
  object-fit: cover;
  padding: 10px;
}
.card {
  transition: 0.2s;
}
.card:hover {
  -webkit-box-shadow: -5px 28px 31px -8px rgba(0, 0, 0, 0.35);
  box-shadow: -5px 28px 31px -8px rgba(0, 0, 0, 0.35);
}
.count {
  display: flex;
  justify-content: center;
  align-items: center;
  color: $_primary;
  font-size: 20px;
  font-weight: 700;
  transition: 0.2s;
  padding: 0 3px;
}

.my_minus,
.my_plus {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 20px;
  height: 20px;
  color: $_white;
  background-color: $_darkGrey;
  border-radius: 0.4rem;
  transition: 0.3s;
  padding: 15px;
  font-size: 1.1rem;
}

.my_minus:active,
.my_plus:active {
  transform: scale(1.3);
}

.my_minus:hover,
.my_plus:hover {
  background-color: $_primary;
}
/*Prevent text selection*/
span {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
}
</style>
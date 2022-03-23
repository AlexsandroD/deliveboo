<template>
  <div v-if="dish.visible" class="card h-100">
    <div class="row h-100">
      <div class="col-6">
        <div class="card-block h-100 p-3">
          <!--           <h4 class="card-title">Small card</h4> -->
          <h4 class="my-2">{{ dish.name }}</h4>
          <p>{{ dish.description }}</p>
          <p class="my-2 fw-bold">&euro; {{ dish.price }}</p>
          <div class="my_buttons">
            <a
              class="btn btn-primary rounded-circle p-2"
              @click="cartLogic.removeCartItem(dish.id)"
              ><i class="fa-solid fa-minus"></i
            ></a>
            <span id="number" class="mx-2" v-if="cartLogic.cart != null">{{
              cartLogic.cart.filter((e) => e.dishId == dish.id).length > 0
                ? cartLogic.cart.find((x) => x.dishId == dish.id).quantity
                : 0
            }}</span>
            <span class="mx-2" v-else>0</span>
            <a
              class="btn btn-primary rounded-circle p-2"
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
              ><i class="fa-solid fa-plus"></i>
            </a>
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
.my_buttons {
  a {
    background-color: $_primary;
    border: none;
    &:active {
      transform: scale(0.98);
    }
  }
}

#number {
  background-color: red;
  color: green;
  width: 200px;
}
</style>
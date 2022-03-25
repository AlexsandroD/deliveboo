<template>
  <div>
    <HeroRestaurant />
    <div class="container-fluid mb-4 max_width_fluid">
      <!-- parte dati ristorante -->
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img
              v-if="restaurant.image_cover"
              class="card-img-top w-100 h-100 p-0 p-lg-3 my_img"
              :src="'http://127.0.0.1:8000/storage/' + restaurant.image_cover"
              :alt="restaurant.name"
            />
            <img
              v-else
              src="https://www.wecanjob.it/moduli/output_immagine.php?id=8444"
              class="card-img-top w-100 h-100 my_img p-0 p-lg-3"
              :alt="restaurant.name"
            />
          </div>
          <div class="col-md-8">
            <div class="card-body p-4">
              <h3 class="card-title text-bold">{{ restaurant.name }}</h3>
              <p class="card-text description">
                🛵{{ restaurant.description }}🥂
              </p>
              <p class="card-text">
                <i class="fa-solid fa-envelope my_icon"></i>:
                {{ restaurant.email }}
              </p>
              <p class="card-text">
                <i class="fa-solid fa-signs-post my_icon"></i>:
                {{ restaurant.address }}, {{ restaurant.city }},
                {{ restaurant.post_code }},
                {{ restaurant.country }}
              </p>
              <strong class="card-text"
                ><i class="fa-solid fa-phone my_icon"></i>:
                {{ restaurant.phone }}</strong
              >
            </div>
          </div>
        </div>
      </div>

      <!-- lista piatti  -->

      <div class="row d-flex justify-content-between mb-5">
        <div class="col-sm-12 col-md-12 col-lg-9">
          <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2">
            <div
              class="col gy-4"
              v-for="dish in restaurant.dishes"
              :key="dish.id"
            >
              <CardDish :dish="dish" :restaurant="restaurant" />
            </div>
          </div>
        </div>

        <div v-if="width >= 992" class="col-sm-5 col-md-3">
          <!-- // cart  -->
          <Cart />
        </div>

        <!-- cart modal error -->
        <div v-if="cartLogic.cartError" class="cart_modal_error">
          <transition name="modal">
            <div class="modal-mask">
              <div class="modal-wrapper">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">
                        Vuoi creare un nuovo carrello?
                      </h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        @click="cartLogic.cartError = false"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <p class="m-0 py-3">
                        Il carrello già esistente da
                        <strong>{{ cartLogic.restaurantName }}</strong> verrà
                        eliminato.
                      </p>
                    </div>
                    <div
                      class="
                        modal-footer
                        justify-content-center justify-content-sm-end
                      "
                    >
                      <router-link
                        :to="{
                          name: 'restaurant-menu',
                          params: { slug: cartLogic.restaurantSlug },
                        }"
                      >
                        <button
                          type="button"
                          class="btn btn_cart"
                          @click="cartLogic.cartError = false"
                        >
                          Vai al carrello
                        </button>
                      </router-link>
                      <button
                        type="button"
                        class="btn btn_delete"
                        @click="cartLogic.emptyCart()"
                      >
                        Elimina carrello
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </transition>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Cart from "../sections/Cart.vue";
import HeroRestaurant from "../sections/HeroRestaurant.vue";
import cartLogic from "../../cartLogic";
import CardDish from "../micro/CardDish.vue";

export default {
  name: "RestaurantMenu",
  components: {
    HeroRestaurant,
    Cart,
    CardDish,
  },
  data() {
    return {
      restaurant: {},
      cartLogic,
      width: 0,
    };
  },

  created() {
    window.scrollTo({ top: 0, behavior: "smooth" });
    window.addEventListener("resize", this.onResize);
    const axios = require("axios").default;
    axios
      .get(`http://127.0.0.1:8000/api/restaurants/${this.$route.params.slug}`)
      .then((response) => {
        this.restaurant = response.data;
        this.cartLogic.newRestaurantId = this.restaurant.id;
      });
  },
  methods: {
    onResize() {
      this.width = window.innerWidth;
    },
  },

  mounted() {
    this.cartLogic.mountedCart();
  },
};
</script>

<style lang="scss" scoped>
@import "../../assets/style/_variables.scss";

.max_width_fluid {
  max-width: 1800px;
}

.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
.card-text.description {
  font-size: 1.2rem;
  color: $_darkGrey;
}
.my_icon {
  margin: 0 5px;
  color: $_primary !important;
}

.my_img {
  object-fit: cover !important;
  max-height: 300px;
}

.cart_modal_error {
  .modal-content {
    border-radius: 0.4rem;
  }

  .modal-header {
    color: #fff;
    background-color: $_cherry;

    button {
      filter: invert(1);
      opacity: 1;
    }
  }

  .modal-body {
    font-size: 1.1rem;
  }

  .modal-footer {
    .btn_cart {
      color: #fff;
      background-color: $_cherry;
      border: 1px solid $_cherry;
      transition: all 0.2s;

      &:hover {
        background-color: #a31251;
      }
    }

    .btn_delete {
      color: #fff;
      background-color: $_darkGrey;
      border: 1px solid $_darkGrey;
      transition: all 0.2s;

      &:hover {
        // color: #fff;
        background-color: $_black;
      }
    }
  }
}
</style>
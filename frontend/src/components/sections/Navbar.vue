<template>
  <div class="container">
    <nav>
      <!-- logo -->
      <b-navbar-brand class="logo me-0" href="http://127.0.0.1:8080/">
        <img
          v-if="scrollPosition < 105"
          src="../../assets/images/logo/logo-scritta-white.png"
          alt="logo"
        />
        <img
          v-else
          src="../../assets/images/logo/logo-scritta-color.png"
          alt="logo"
        />
      </b-navbar-brand>

      <!-- btn cart sm -->
      <div class="navbar-right d-flex">
        <button class="btn btn_cart_sm" @click="showCart = !showCart" :class="scrollPosition < 105 ? 'box_shadow' : ''">
          <i class="fa-solid fa-cart-shopping"></i>
        </button>

        <!-- cart dropdown sm -->
        <div class="cart_dropdown" v-if="showCart">
          <div class="dropdown_container">
            <div class="dropdown_header">
              <h2>Il tuo Carrello</h2>
              <div @click="showCart = !showCart">
                <i class="fa-solid fa-xmark"></i>
              </div>
            </div>
            <NavCart />
          </div>
        </div>

        <!-- cart btn md -->
        <a v-if="cartLogic.totalPrice == 0" class="btn btn_cart_md ms-3" :class="scrollPosition < 105 ? 'box_shadow' : ''">
          <i class="fas fa-shopping-cart"></i>
          <span class="ms-2">€ {{ cartLogic.totalPrice }}</span>
        </a>
        <router-link
          v-else
          class="btn btn_cart_md ms-3"
          :class="scrollPosition < 105 ? 'box_shadow' : ''"
          :to="{
            name: 'restaurant-menu',
            params: { slug: cartLogic.restaurantSlug },
          }"
        >
          <i class="fas fa-shopping-cart"></i>
          <span class="ms-2">€ {{ cartLogic.totalPrice }}</span>
        </router-link>

        <!-- admin btn -->
        <a class="ms-3" href="http://127.0.0.1:8000/admin">
          <div :class="scrollPosition < 105 ? 'box_shadow' : ''" class="btn">
            <i class="fa-solid fa-user"></i>
          </div>
        </a>
      </div>
    </nav>
  </div>
</template>

<script>
import NavCart from "../sections/NavCart.vue";
import cartLogic from "../../cartLogic";

export default {
  name: "Navbar",
  data() {
    return {
      cartLogic,
      scrollPosition: null,
      showCart: false,
    };
  },
  components: {
    NavCart,
  },
  methods: {
    updateScroll() {
      this.scrollPosition = window.scrollY;
    },
  },
  mounted() {
    this.cartLogic.mountedCart();
    window.addEventListener("scroll", this.updateScroll);
  },
};
</script>

<style lang = "scss" scoped>
@import "../../assets/style/variables.scss";

.box_shadow {
  -webkit-box-shadow: 5px 4px 16px -2px rgba(0, 0, 0, 0.53);
  box-shadow: 5px 4px 16px -2px rgba(0, 0, 0, 0.53);
}

.container {
  nav {
    display: flex;
    justify-content: space-between;
    align-items: center;

    padding: 1rem 0;

    /* icona deliveboo */
    a.navbar-brand.logo {
      height: 100%;

      padding: 0;

      img {
        height: 2rem;
      }
    }

    /* bottoni a destra */
    .navbar-right {
      .btn {
        background-color: $_primary;
        color: $_white;

        padding: 0.2rem 0.6rem;

        &:focus {
          box-shadow: none;
        }

        svg {
          font-size: 0.8rem;
        }
      }

      .btn_cart_md {
        display: none;
      }

      .cart_dropdown {
        position: fixed;
        inset: 0;
        z-index: 100;

        background-color: $_white;
        opacity: 1;

        animation: pop-in 0.5s;
        -webkit-animation: pop-in 0.5s;
        -moz-animation: pop-in 0.5s;
        -ms-animation: pop-in 0.5s;
      }

      @-webkit-keyframes pop-in {
        0% {
          opacity: 0;
          -webkit-transform: scale(0.5);
        }
        100% {
          opacity: 1;
          -webkit-transform: scale(1);
        }
      }
      @-moz-keyframes pop-in {
        0% {
          opacity: 0;
          -moz-transform: scale(0.5);
        }
        100% {
          opacity: 1;
          -moz-transform: scale(1);
        }
      }
      @keyframes pop-in {
        0% {
          opacity: 0;
          transform: scale(0.5);
        }
        100% {
          opacity: 1;
          transform: scale(1);
        }
      }

      .dropdown_container {
        background-color: $_white;

        border-radius: 0.4rem;

        .dropdown_header {
          display: flex;
          justify-content: space-between;

          background-color: $_primary;
          color: $_white;
          padding: 1rem 2rem;

          h2 {
            margin: 0;
          }

          svg.fa-xmark {
            font-size: 1.4rem;
          }
        }
      }
    }
  }
}

//00000000 MEDIA QUERIES 00000000
@media (min-width: 992px) {
  .container {
    nav {
      padding: 1.1rem 0;

      /* icona deliveboo */
      a.navbar-brand.logo {
        height: 100%;

        img {
          height: 2.6rem;
        }
      }

      .navbar-right {
        .btn {
          padding: 0.6rem 1rem;

          &.btn_cart_sm {
            display: none;
          }

          &.btn_cart_md {
            display: block;
          }

          svg {
            font-size: 1rem;
          }
        }
      }
    }
  }
}
</style>
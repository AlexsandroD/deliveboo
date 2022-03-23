<template>
  <div class="container">
    <nav>
      <!-- logo -->
      <b-navbar-brand class="logo" href="http://127.0.0.1:8080/">
        <img src="../../assets/images/logo/logo-scritta-color.png" alt="logo" />
      </b-navbar-brand>
      
      <div class="navbar-right">
        <button class="btn btn_cart_sm" @click="showCart = !showCart">
            <i class="fa-solid fa-cart-shopping"></i>
        </button>

        <div class="cart_dropdown" v-if="!showCart">
          <NavCart />
        </div>
        
        <a class="ms-3" href="http://127.0.0.1:8000/admin">
            <div class="btn">
                <i class="fa-solid fa-user"></i>
            </div>
        </a>
      </div>

    </nav>
      <!-- hamburger button -->
      <!-- <b-navbar-toggle class="toggle" target="nav-collapse">
        <div class="plate plate4" onclick="this.classList.toggle('active')">
          <svg
            class="burger"
            version="1.1"
            height="100"
            width="100"
            viewBox="0 0 100 100"
          >
            <path class="line line1" d="M 50,35 H 30" />
            <path class="line line2" d="M 50,35 H 70" />
            <path class="line line3" d="M 50,50 H 30" />
            <path class="line line4" d="M 50,50 H 70" />
            <path class="line line5" d="M 50,65 H 30" />
            <path class="line line6" d="M 50,65 H 70" />
          </svg>
        </div>
      </b-navbar-toggle>

      <b-collapse class="buttons" id="nav-collapse" is-nav>
        <b-navbar-nav> -->

          <!-- tile carrello -->
          <!-- <b-nav-text>
            <router-link class="nav-link" :to="{ name: 'restaurant-menu', params: { slug: cartLogic.restaurantSlug }}">
              <i class="fas fa-shopping-cart"></i>
              <span class="ms-2">€ {{ cartLogic.totalPrice }}</span>
            </router-link>
          </b-nav-text> -->

          <!-- tile user backoffice -->
          <!-- <b-nav-text>
            <a class="nav-link" href="http://127.0.0.1:8000/admin">
              <i class="fa-solid fa-user"></i>
            </a>
          </b-nav-text>


        </b-navbar-nav>
      </b-collapse> -->
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
    NavCart
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

.container {

  nav {
    position: relative;

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

    .navbar-right {
      
      .btn {
        background-color: $_primary;
        color: $_white;

        &:focus {
          box-shadow: none;
        }
      }
      
      .cart_dropdown {
        position: absolute;
        top: 5rem;
        left: 0;

        width: 100%;
      }
    }










    /* hamburger button */
    .navbar-toggler.toggle {
      background-color: $_primary;

      padding: 0;
      border: none;

      &:focus {
        box-shadow: none;
      }

      /* hamburger icon animation */
      /* svg {
        height: 2.4rem;
        width: 2.4rem;
        margin: 0 0.4rem;
      }

      .line {
        fill: none;
        stroke: $_white;
        stroke-width: 6px;
        stroke-linecap: round;
        stroke-linejoin: round;
        transform-origin: 50%;
        transition: stroke-dasharray 500ms 200ms, stroke-dashoffset 500ms 200ms,
          transform 500ms 200ms;
      }

      .plate4 .line {
        transform-origin: 50%;
        transition: transform 400ms 100ms;
      }

      .active.plate4 .line1 {
        transform: translateX(18px) translateY(-3px) rotate(-45deg) scale(0.7);
      }

      .active.plate4 .line2 {
        transform: translateX(-18px) translateY(-3px) rotate(45deg) scale(0.7);
      }

      .active.plate4 .line3 {
        transform: translateY(0px) rotate(45deg) scale(0.7);
      }

      .active.plate4 .line4 {
        transform: translateY(0px) rotate(-45deg) scale(0.7);
      }

      .active.plate4 .line5 {
        transform: translateX(18px) translateY(3px) rotate(45deg) scale(0.7);
      }

      .active.plate4 .line6 {
        transform: translateX(-18px) translateY(3px) rotate(-45deg) scale(0.7);
      }

      .active.plate4 .x {
        transition: transform 400ms 100ms;
        transform: scale(1);
      } */
    }

    /* .navbar-collapse.buttons {
      justify-content: flex-end;
      border: none;

      .navbar-text {
        padding: 1rem 0 0;

        a.nav-link {
          height: 2.25rem;

          display: flex;
          justify-content: center;
          align-items: center;

          background-color: $_primary;
          color: $_white;

          padding: 0;
          border-radius: .4rem;

          span {
            font-size: .9rem;
            font-weight: 900;

            text-decoration: none;
          }
          
          i {
            font-size: .9rem;
          }
        }
      }
    } */
  }
}
</style>
<template>
<!-- <div> -->
<div class="container">
<div>
  <b-navbar toggleable="lg" type="dark" variant="info">
    <b-navbar-brand href="http://127.0.0.1:8080/"><img src="../../assets/images/logo/deliveboo-logo.svg" alt="logo"></b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item href="#">Link</b-nav-item>
        <b-nav-item href="#" disabled>Disabled</b-nav-item>
      </b-navbar-nav>

      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto">
        <b-nav-form>
          <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
          <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
        </b-nav-form>

        <b-nav-item-dropdown text="Lang" right>
          <b-dropdown-item href="#">EN</b-dropdown-item>
          <b-dropdown-item href="#">ES</b-dropdown-item>
          <b-dropdown-item href="#">RU</b-dropdown-item>
          <b-dropdown-item href="#">FA</b-dropdown-item>
        </b-nav-item-dropdown>

        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template #button-content>
            <em>User</em>
          </template>
          <b-dropdown-item href="#">Profile</b-dropdown-item>
          <b-dropdown-item href="#">Sign Out</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>
    <!-- <div class="logo">
        <a href="http://127.0.0.1:8080/">
            <img src="../../assets/images/logo/deliveboo-logo.svg" alt="logo">
        </a>
    </div>
    <div class="buttons">
        <a class="btn" href="./Cart.vue"><i class="fas fa-shopping-cart"></i>
        
            <router-link 
            :to="{ name: 'restaurant-menu', params: { slug:cartLogic.restaurantSlug } }">
                <span>€ {{ cartLogic.totalPrice }}</span>
            </router-link>
        </a>
    <a class="btn btn-primary" href=" http://127.0.0.1:8000/admin" role="button">Admin</a>
    </div> -->
</div>

<!-- </div> -->
</template>

<script>
import cartLogic from "../../cartLogic";
export default {
    name:"Navbar",
    data(){
      return{
        cartLogic,
      }
    },
    mounted(){
        this.cartLogic.mountedCart();
    }
}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';
.container{
    /* box-shadow: inset 0px 67px 53px -33px rgba(50, 50, 50, 0.75); */
    z-index: 1;
    display: flex;
    height: 80px;
    align-items: center;
    justify-content: space-between;
    padding: 20px 2px;
    top: 0;
    left: 0;
    right: 0;
    position: fixed;
    .logo{
        color: $_primary;
        height: 100%;
        img{
            height: 100%;
        }
    }
    .buttons{
        border: none;
        a{
            color: white;
            text-decoration: none;
            margin-left: 15px;
            background-color: $_primary;
            span{
                background-color: $_primary;
                padding: 3px;
                text-decoration: none;
                border-radius: 3px;
            }
        }
    }
}
</style>
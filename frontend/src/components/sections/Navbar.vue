<template>
<!-- <div> -->
<div class="container">
  <b-navbar class="hamburgher" toggleable="lg" type="dark" variant="info">
    <b-navbar-brand class="logo" href="http://127.0.0.1:8080/">
        <img src="../../assets/images/logo/deliveboo-logo.svg" alt="logo">
    </b-navbar-brand>

    <b-navbar-toggle class="toggle " target="nav-collapse"></b-navbar-toggle>

    <b-collapse class="buttons" id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item class="btn" href="#">
            <i class="fas fa-shopping-cart"></i>
            <router-link 
                :to="{ name: 'restaurant-menu', params: { slug:cartLogic.restaurantSlug } }">
                <span>€ {{ cartLogic.totalPrice }}</span>
            </router-link>
        </b-nav-item>
        <b-nav-item class="btn" href=" http://127.0.0.1:8000/admin" role="button"><i class="fa-solid fa-user"></i></b-nav-item>
        <!-- <b-nav-item href="#"><a class="btn" href=" http://127.0.0.1:8000/admin" role="button">Utente</a></b-nav-item> -->
        <!-- <b-nav-item href="#" disabled>Disabled</b-nav-item> -->
      </b-navbar-nav>

    </b-collapse>
  </b-navbar>
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
    <a class="btn" href=" http://127.0.0.1:8000/admin" role="button">Admin</a>
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
        // navbar,
      }
    },
    mounted(){
        this.cartLogic.mountedCart();
    },

}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';
/* .container{
    box-shadow: inset 0px 67px 53px -33px rgba(50, 50, 50, 0.75);
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
} */
.container{
    padding: 0;
    margin: 0 auto;
    z-index: 1;
    height: 80px;
    /* display: flex;
    align-items: center;
    justify-content: space-between; */
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    /* padding: 20px 2px; */

    .hamburgher{
        background-color: transparent !important;
        width: 100%;
        height: 100%;
        color: $_primary;
        .toggle{
            background-color: $_primary;
        }        
        .logo{
            color: $_primary;
            height: 100%;
            img{
                height: 95%;
            }
        }
        .buttons{
        flex-flow: row-reverse;
        border: none;
            a{
                border-radius: 5px;
                color: white;
                text-decoration: none;
                margin-left: 13px;
                background-color: $_primary;
                span{
                    background-color: $_primary;
                    padding: 3px;
                    text-decoration: none;
                    border-radius: 3px;
                }
            }
            .fa-user{
                padding-left: 10px;
                padding-right: 10px;
            }
        }
    }
    
}
</style>
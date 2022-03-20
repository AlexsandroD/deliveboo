<template>
<div class="container">
    <div class="logo">
        <a href="http://127.0.0.1:8080/">
            <img src="../../assets/images/logo/logo-white.png" alt="logo">
        </a>
    </div>
    <div class="buttons">
        <a class="btn btn-primary" href="./Cart.vue">Carrello
        
            <router-link 
            :to="{ name: 'restaurant-menu', params: { slug:cartLogic.restaurantSlug } }">
                <span>€ {{ cartLogic.totalPrice }}</span>
            </router-link>
        </a>
    <a class="btn btn-primary" href=" http://127.0.0.1:8000/admin" role="button">Admin</a>
    </div>
</div>
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
    display: flex;
    height: 80px;
    align-items: center;
    justify-content: space-between;
    padding: 20px 2px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    .logo{
        height: 80%;
        img{
            height: 100%;
        }
    }
    .buttons{
        a{
            text-decoration: none;
            margin-left: 15px;
            span{
                background-color: white;
                padding: 3px;
                text-decoration: none;
                border-radius: 3px;
            }
        }
    }
}
</style>
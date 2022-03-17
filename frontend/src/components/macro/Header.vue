<template>
  <header>
     <a class="btn btn-primary" href=" http://127.0.0.1:8000/admin" role="button">Admin</a>
     <ul>
       
       <li>
         <router-link 
         :to="{ name: 'restaurant-menu', params: { slug:cartLogic.restaurantSlug } }">
           {{ cartLogic.totalPrice }}
          </router-link>
        </li>
     </ul>
  </header>
</template>

<script>
import cartLogic from "../../cartLogic";
export default {
    name: 'Header',
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

<style>

</style>
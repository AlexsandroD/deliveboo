<template>
  <div class="div">
      <h2>Carrello</h2>
      <p>{{cartLogic.restaurantName}}</p>
      <ul>
          <li v-for='dish in cartLogic.cart' :key='dish.dishId'>
              {{ dish.name }}
          </li>
      </ul>

  </div>
</template>

<script>
import cartLogic from "../../cartLogic";
export default {
    name:'Cart',
    data(){
        return{
            cartLogic,
        }
    }
  
    
}
</script>

<style>

</style>
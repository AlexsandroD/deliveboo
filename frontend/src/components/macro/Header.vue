<template>
  <header>
     <a class="btn btn-primary" href=" http://127.0.0.1:8000/admin" role="button">Admin</a>
     <ul>
       <li>{{ cartLogic.totalPrice }}</li>
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
    }
}
</script>

<style>

</style>
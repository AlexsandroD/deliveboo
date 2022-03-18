<template>
  <div class="container">

  </div>
</template>

<script>
import cartLogic from "../../cartLogic";
export default {
    name:'Checkout',
    data(){
        return{
            cartLogic,
            token:null,
        }
    },

    created(){
        const axios = require('axios').default;
        axios.get('http://127.0.0.1:8000/api/orders-token')
            .then((response) => {
                this.token = response.data;
             })
    }
}
</script>

<style>

</style>
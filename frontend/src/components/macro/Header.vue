<template>
  <header>
    <Navbar />
    <Hero />
  </header>
</template>

<script>
// import cartLogic from "../../cartLogic";
import Navbar from "../sections/Navbar.vue";
import Hero from "../sections/Hero.vue";

export default {
    name: 'Header',
    components:{
      Navbar,
      Hero,
    },
    // data(){
    //   return{
    //     cartLogic,
    //   }
    // },
    // mounted(){
    //     this.cartLogic.mountedCart();
    // }
}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';
header{
  /* background-image: url('../../assets/images/bg/background_homepage.svg');
  background-size: cover; */
  width: 100%;
  .categories{
    background-color: white;
    border-radius: 5px;
    box-shadow: 1px 1px gray;
  }
}
</style>
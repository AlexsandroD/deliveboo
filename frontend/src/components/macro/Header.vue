<template>
  <header  :class="{change_color: scrollPosition > 300}">
    <Navbar />
  </header>
</template>

<script>
// import cartLogic from "../../cartLogic";
import Navbar from "../sections/Navbar.vue";

export default {
    name: 'Header',
    components:{
      Navbar,
    },
    data() {
      return {
        scrollPosition: null,
      };
    },
    methods: {
      updateScroll() {
        this.scrollPosition = window.scrollY;
      }
    },
    mounted() {
      window.addEventListener('scroll', this.updateScroll);
    },
}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';
header{
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1;
    
    transition: background-color .3s linear;
}

.change_color {
    background-color: $_white;
}
</style>
<template>
<div class="hero-restaurant mb-4">
  <img src="../../assets/images/bg/bg_friends.svg" alt="friend illustration">
</div>
</template>

<script>
export default {
    name:"HeroRestaurant",
}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';

.hero-restaurant{
  position: relative;

  height: 150px;

  margin: 0 auto;
  padding: 0;

  background: rgb(0,204,188);
  background: linear-gradient(355deg, rgba(208,235,153,1) 60%, rgba(0,204,188,1) 60%);

  img {
    width: 90%;

    position: absolute;
    bottom: -6px;
    right: 5%;
  }
}

//00000000 MEDIA QUERIES 00000000
@media (min-width: 576px) {
  .hero-restaurant{
    height: 200px;

    img {
      width: 80%;

      bottom: -9px;
    }
  }
}

@media (min-width: 768px) {
  .hero-restaurant{
    height: 230px;

    img {
      width: 70%;

      bottom: -11px;
    }
  }
}

@media (min-width: 992px) {
  .hero-restaurant{
    height: 260px;

    img {
      width: 40rem;

      bottom: -13px;
      right: 10%;
    }
  }
}
</style>
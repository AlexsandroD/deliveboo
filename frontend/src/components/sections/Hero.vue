<template>
<div class="hero">
    <video autoplay muted loop>
        <source src="../../assets/video/output11.mp4" type="video/mp4">
        <source src="movie.ogg" type="video/ogg">
        Your browser does not support the video tag.
    </video>
</div>
</template>

<script>
export default {
    name:"Hero",
}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';
.hero{
  max-width: 1800px;

  margin: 0 auto;
  padding: 0;

  video{
      width: 100%;
      height: 300px;

      object-fit: cover;
      position: relative;
  }
}

//00000000 MEDIA QUERIES 00000000
@media (min-width: 768px) {
.hero{
  max-width: 1800px;

  clip-path: polygon(0 0, 100% 0, 100% 70%, 0 100%);

  margin: 0 auto;
  padding: 0;

  video{
      width: 100%;
      height: 300px;

      object-fit: cover;
      position: relative;
  }
}
}
</style>
<template>
  <div class="hero">
    <video autoplay muted loop>
      <source
        src="../../assets/video/outputcompress-video-online.com.mp4"
        type="video/mp4"
      />
      <!-- <source src="../../assets/video/video.mp4" type="video/mp4" /> -->
      <source src="movie.ogg" type="video/ogg" />
      Your browser does not support the video tag.
    </video>
  </div>
</template>
<script>
export default {
  name: "Hero",
};
</script>

<style lang = "scss" scoped>
@import "../../assets/style/variables.scss";
.hero {
  margin: 0 auto;
  padding: 0;

  video {
    width: 100%;
    height: 200px;

    object-fit: cover;

    background: rgb(0, 204, 188);
    background: linear-gradient(
      355deg,
      rgba(208, 235, 153, 1) 60%,
      rgba(0, 204, 188, 1) 60%
    );
  }
}

//00000000 MEDIA QUERIES 00000000
@media (min-width: 768px) {
  .hero {
    video {
      height: 300px;
    }
  }
}
</style>
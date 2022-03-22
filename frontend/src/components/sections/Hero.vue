<template>
<div class="hero">
    <video autoplay muted loop>
        <source src="../../assets/video/output8.mp4" type="video/mp4">
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
    /* position: relative; */
    margin: 0 auto;
    max-width: 1800px;
    /* -webkit-clip-path: polygon(0 0, 100% 0, 100% 85%, 0% 100%); */
    /* clip-path: polygon(50% 0%, 100% 0, 100% 76%, 88% 80%, 29% 95%, 0 78%, 0 0); */
    clip-path: polygon(0 0, 100% 0, 100% 71%, 0 100%);
    padding: 0;
    video{
        /* position: absolute;
        top: 0;
        left: 0; */
        width: 100%;
        margin-bottom: -10px;
        z-index: -1;
        backface-visibility: hidden;
    }
}
</style>
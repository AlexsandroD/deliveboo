<template>
<div class="container">
    <video autoplay muted>
        <source src="../../assets/video/delivefood.mp4" type="video/mp4">
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
/* .background{ */
    /* background-image: url('../../assets/images/bg/background_homepage.svg');
    background-size: cover; */
    /* height: 600px;
    width: 100vw; */
    /* .video{
        width: 100%;
        height: 100%;
    } */
    .container{
        /* .hero{ */
            height: 400px;
            width: 100%;
            video{
                /* margin: auto; */
                width: 100%;
                /* padding: 20px 0; */
                /* iframe{
                    margin-top: 70px;
                } */
            }
        /* } */

    }
/* } */

</style>
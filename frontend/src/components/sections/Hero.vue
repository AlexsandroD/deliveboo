<template>
<div class="background">
    <div class="container">
        <div class="hero">
            <!-- <div class="video-foreground">
                <img src="../../assets/images/bg/background_homepage.svg" alt="background">
            </div> -->

            <!-- <div class="content">
                <ul>
                <li>
                    <router-link 
                    :to="{ name: 'restaurant-menu', params: { slug:cartLogic.restaurantSlug } }">
                    {{ cartLogic.totalPrice }}
                    </router-link>
                </li>
                </ul>
            </div> -->
            <div class="video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/6abGoo_PIJg?&loop=1&rel=0&modestbranding=1&iv_load_policy=3&fs=0&disablekb=1&mute=1&controls=0&autoplay=1&showinfo=0&playlist=6abGoo_PIJg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
            <div class="title">
                <h1>Cosa stai cercando?</h1>
            </div>

    </div>
    
</div>
</template>

<script>
export default {
    name:"Hero",
}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';
.background{
    background-image: url('../../assets/images/bg/background_homepage.svg');
    background-size: cover;
    .container{
        .hero{
            height: 400px;
            .video{
                margin: auto;
                width: fit-content;
                padding: 20px 0;
                iframe{
                    margin-top: 70px;
                }
            }
        }
        .title{
            color: $_darkerPrimaryHover;
            /* text-shadow: 2px 2px 4px black; */
            padding: 20px  0px 5px 0;
        }
}
}

</style>
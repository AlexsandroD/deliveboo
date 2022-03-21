<template>
    <div class="news_container">
        <div class="news_row">
            <h2>Novità dalla nostra cucina</h2>
            <DelForWork />
            <DelNewsApp />
        </div>
    </div>
</template>

<script>

import DelForWork from "../micro/DelForWork.vue";
import DelNewsApp from "../micro/DelNewsApp.vue";


export default {
    name:'News',
    components:{
        DelForWork,
        DelNewsApp,
    }
}
</script>

<style lang="scss" scoped>
@import "../../assets/style/global.scss";

    .news_container{
            background-color:$_whiteSmoke;
            width: 100%;
            margin: 0 auto;
            padding: 50px 0 80px;
            h2{
                align-self: start;
                font-size: 2rem;
                font-weight: bold;
                margin: 0 0 35px;
            }
            .news_row{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                
            }

        }
    

     @media screen and (min-width: 768px){
        .news_row{
            width: 720px;
            margin: 0 auto;
        }
    }
    @media screen and (min-width: 992px){
        .news_row{
                width: 960px;
        }
    }
    @media screen and (min-width: 1200px){
        .news_row{
                width: 1140px;
        }
    }
    @media screen and (min-width: 1400px){
        .news_row{
                width: 1320px;
        }
    }
        
      
</style>
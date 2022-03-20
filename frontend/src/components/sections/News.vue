<template>
    <div class="news-section">
        <div class="news_main">
            <h2>Novitá della nostra cucina</h2>
            <div class="news_container">
                <DelForWork />
                <DelNewsApp />
            </div>
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

    .news-section{
        background-color:$_whiteSmoke;

        .news_main {
            width: 100%;
            margin: 0 auto;
            padding: 50px 0 80px;
            h2{
                font-size: 2rem;
                font-weight: bold;
                margin: 0 0 35px;
            }
            .news_container{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                
            }

        }
    }
    @media screen and (min-width: 720px){
         .news-section{
        .news_main {
            width: 70%;
        }  
       }
    }
</style>
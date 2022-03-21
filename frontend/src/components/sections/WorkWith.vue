<template>
        <div class="work_with_us_container">
            <div class="work_with_us_row">
                <h2>Lavora con noi</h2>
                <Card />
            </div>
        </div>
</template>

<script>
import Card from "../micro/Card";
export default {
    name:'WorkWith',
    components:{
        Card,
    }
}
</script>

<style lang="scss" scoped>
@import "../../assets/style/global.scss";


        
        .work_with_us_container{
            background-color:$_whiteSmoke;
            width: 100%;
            margin: 0 auto;
            padding: 50px 0 80px;
            h2{
                font-size: 2rem;
                font-weight: bold;
                margin: 0 0 35px;
                align-self: start;
            }
            .work_with_us_row{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                
            }

        }
    

    
    @media screen and (min-width: 768px){
            .work_with_us_row{
                width: 720px;
                margin: 0 auto;
            }
    }
    @media screen and (min-width: 992px){
        .work_with_us_row{
                width: 960px;
        }
    }
    @media screen and (min-width: 1200px){
        .work_with_us_row{
                width: 1140px;
        }
    }
    @media screen and (min-width: 1400px){
        .work_with_us_row{
                width: 1320px;
        }
    }

</style>
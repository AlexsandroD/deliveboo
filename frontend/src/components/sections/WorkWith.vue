<template>
   <div class="work_with_us-section">
        <div class="work_with_us_container">
            <h2>Lavora con noi</h2>
            <div class="work_with_us_row">
                <Card />
            </div>
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

    .work_with_us-section{
        background-color:$_whiteSmoke;

        .work_with_us_container{
            width: 100%;
            margin: 0 auto;
            padding: 50px 0 80px;
            h2{
                font-size: 2rem;
                font-weight: bold;
                margin: 0 0 35px;
            }
            .work_with_us_row{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                
            }

        }
    }

    @media screen and (min-width: 720px){
       .work_with_us-section{
        background-color:$_whiteSmoke;

            .work_with_us_container{
                width: 70%;
                margin: 0 auto;
                padding: 50px 0 80px;
                h2{
                    font-size: 2rem;
                    font-weight: bold;
                    margin: 0 0 35px;
                }
                .work_with_us_row{
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    
                }

            }
        }
    }

</style>
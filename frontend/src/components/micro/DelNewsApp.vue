<template>
  <div class="col">
        
     
      <div class="text pb-4">
          <h2>Hai giá la nostra App?</h2>
          <p>Scaricala ora - disponibile su Apple store e Google Play!</p>
        <ul>
            <li><a href="https://www.apple.com/it/app-store"><img src="../../assets/images/end_page/ios-app-store.svg" alt="Apple_store"></a></li>
            <li><a href="https://play.google.com"><img src="../../assets/images/end_page/android-app-store.svg" alt="Google_play_store"></a></li>
        </ul>
      </div>
      <div class="img_top"></div>
  </div>
</template>

<script>
export default {
    name:'DelNewsApp',
}
</script>

<style lang="scss" scoped>
@import "../../assets/style/global.scss";

  
     
     .col{
        display:grid;
        position: relative;
        background-color:$_white;
        width: 100%;
        min-height: 200px;
        margin: auto;
        grid: auto-flow / 1fr 1fr;
        margin: 20px 0;
      
  
            .img_top{
                background-image: url('../../assets/images/cards/deliveroo-app.svg');
                background-size:cover;
                background-position: center;
                background-repeat: no-repeat;
                 -webkit-clip-path: polygon(5% 0, 100% 0, 100% 100%, 0 100%);
               clip-path: polygon(5% 0, 100% 0, 100% 100%, 0 100%);
            }
           
        
        }

        .text{
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 5px;
            
            h2{
                font-size: 2rem;
                margin: 10px 0px;
            }
            p{
                margin: 10px 0px;
                font-size: 1rem;
            }

            ul{
                display: block;
                align-items: center;
                list-style: none;
            
                
                li{
                
                h2{
                    font-weight: bold;
                    font-size: 18px;
                }
                a{
                    color: $_white;
                    text-decoration: none;
                    font-weight: thin;
                
                    img{
                    width: 135px;

                    }
                }
                a:hover{
                    color: $_darkerPrimaryHover;
                }
                }
            }
                
     }
    
    

    @media screen and (min-width: 572px) {
        .container{
            min-height: 210px;
            .text{
             padding: 10px;
            }
            ul{
             display: flex;
            }
        }
        
    }

</style>
<template>
  <div class="col">
        
      <div class="img_top"></div>
     
      <div class="text">
          <h2>Deliveroo for work</h2>
          <p>CLienti o colleghi affamati? il nostro team Corporate ti puó aiutare.</p>
          <a class="btn" href="">Contattaci</a>
      </div>
  </div>
</template>

<script>
export default {
    name:'DelForWork'
}
</script>

<style lang="scss" scoped>
@import "../../assets/style/global.scss";

    @media screen and (min-width: 100px) {
     
     .col{
        display:grid;
        position: relative;
        background-color:$_white;
        width: 100%;
        min-height: 200px;
        grid: auto-flow / 1fr 1fr;
        margin: 20px 0;

      

        .img_top{
            background-image: url('../../assets/images/cards/business.4fa3b853.jpg');
            background-size:cover;
            background-position: center;
            background-repeat: no-repeat;
                -webkit-clip-path: polygon(0 0, 0 100%, 93% 100%, 100% 0);
                clip-path: polygon(0 0, 0 100%, 95% 100%, 100% 0);
        }
           
        
        }

        .text{
            display: flex;
            flex-direction: column;
            justify-content: center;
         
            
            h2{
                font-size: 2rem;
                font-weight: bold;
                margin: 10px 0px;
            }
            p{
                margin: 10px 0px;
                font-size: 1rem;
            }
            
        }


        .btn{
            text-align: center;
            width: 100px;
            border-radius:5px;
            background-color:$_primary;
            color: $_white;
            padding: 10px;
            margin-top: 10px;
            &:hover{
                background-color:$_darkerPrimaryHover;
            }
        }
     }
    
    

    @media screen and (min-width: 650px) {
        .col{
            min-height: 240px;
            .text{
                padding: 10px;
            }
        }
        
    }

</style>
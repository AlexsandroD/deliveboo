<template>
  <div class="container">
      <div class="image"></div>
      <div class="text">
          <h2>Deliveroo for work</h2>
          <p>CLienti o colleghi affamati? il nostro team Corporate ti puó aiutare.</p>
          <a class="btn" href="">Contattaci</a>
      </div>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
@import "../../assets/style/global.scss";

    @media screen and (min-width: 100px) {
     .container{
        display:grid;
        background-color: $_whiteSmoke;
        width: 100%;
        min-height: 200px;
        margin: auto;
        grid: auto-flow / 1fr 1fr;
        .image{
            background-image: url('../../assets/images/cards/business.4fa3b853.jpg');
            background-size:cover;
            // background-size: 100%;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
             -webkit-clip-path: polygon(0 0, 0 100%, 93% 100%, 100% 0);
             clip-path: polygon(0 0, 0 100%, 95% 100%, 100% 0);
        }

        .text{
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 10px;
            h2{
                font-size: 2rem;
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
            background-color:$_darkerPrimaryHover;
            color: white;
            padding: 10px;
            margin-top: 10px;
        }
     }
    }
    

    @media screen and (min-width: 650px) {
        .container{
            width: 60%;
            min-height: 210px;
        }
        
    }

</style>
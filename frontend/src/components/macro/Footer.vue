<template>
  <footer>
    <div class="container">

      <div class=" row g-3 row-cols-1 row-cols-md-2 row-cols-lg-4">
        <div class="col">
          <div class="box rounded">
            <ul>
              <li><h2>Scopri Deliveboo</h2></li>
              <li><a href="#">Investitori</a></li>
              <li><a href="#">Chi siamo</a></li>
              <li><a href="#">Ristoranti</a></li>
              <li><a href="#">Altro</a></li>
              <li><a href="#">Pressroom</a></li>
              <li><a href="#">Il nostro blog</a></li>
              <li><a href="#">Programmazione</a></li>
              <li><a href="#">Design</a></li>
              <li><a href="#">Lavora con noi</a></li>
              <li><a href="#">Diventa nostro partner</a></li>
            </ul>
          </div>
        </div>

        <div class="col">
          <div class="box rounded">
            <ul>
              <li><h2>Note legali</h2></li>
              <li><a href="#">Termini & Condizioni</a></li>
              <li><a href="#">Informativa sulla privacy</a></li>
              <li><a href="#">Cookies</a></li>
            </ul>
          </div>
        </div>
        
        <div class="col">
          <div class="box rounded">
            <ul>
              <li><h2>Aiuto</h2></li>
              <li><a href="#">Contatti</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Tipi di cucina</a></li>
            </ul>
          </div>
        </div>

        <div class="col">
          <div class="box rounded">
              <ul>
                <li><h2>Porta Deliveboo con te</h2></li>
                <li><a href="https://www.apple.com/it/app-store"><img src="../../assets/images/end_page/ios-app-store.svg" alt="Apple_store"></a></li>
                <li class="mt-3"><a href="https://play.google.com"><img src="../../assets/images/end_page/android-app-store.svg" alt="Google_play_store"></a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container my-4">
      <a href="https://m.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
      <a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
      <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
    </div>
  </footer>
</template>

<script>
export default {
    name: 'Footer',
}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';
footer{
  background-color: $_black;
  padding: 24px 0;
  color: $_white;
  .container{
    margin: 0 auto;
    font-size: 14px;
    .box{
      background-color: $_darkGrey;
      height: 100%;
      ul{
        list-style: none;
        margin-top: inherit;
        padding: 27px 25px;
        margin-bottom: 0;
        li{
          h2{
            font-weight: bold;
            font-size: 18px;
          }
          a{
            color: $_white;
            text-decoration: none;
            font-weight: thin;
            line-height: 25px;
            transition-delay: 0.1s;
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
  }
  .svg-inline--fa{
    color: $_white;
    margin-right: 20px;
    font-size: 24px;
    transition-delay: 0.1s;
  }
  .fa-facebook:hover{
    color: $_blue;
  }
    .fa-twitter:hover{
    color: $_lightBlue;
  }
    .fa-instagram:hover{
    color: $_cherry;
  }
}
</style>
<template>
     <div class="col my-2">
          <div v-if="dish.visible" class="card  h-100">
            <div class="card-body">
              <h5 class="card-title">{{dish.name}}</h5>
              <div class="overflow-hidden img-wrapper">
                <img v-if="dish.image" class="card-img-top"  :src="'http://127.0.0.1:8000/storage/' + dish.image" :alt="dish.name">
                <img v-else src="https://www.wecanjob.it/moduli/output_immagine.php?id=8444"  style="width:200px" :alt="dish.name">
              </div>
              <p class="card-text">{{ dish.description }}</p>
              <p class="card-text">&euro;{{ dish.price }}</p>
              <button @click="cartLogic.removeCartItem(dish.id)">meno</button>
              <span v-if="cartLogic.cart != null">{{cartLogic.cart.filter(e => e.dishId == dish.id).length > 0 ? cartLogic.cart.find(x => x.dishId == dish.id).quantity : 0}}</span>
              <span v-else>0</span>
              <button @click="cartLogic.addCartItem(dish.id,dish.name,dish.price,restaurant.id,restaurant.slug,restaurant.name)">piú</button>
            </div>
          </div>
           <div v-else class="card" disabled  style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{dish.name}}</h5>
              <img v-if="dish.image" class="card-img-top"  :src="'http://127.0.0.1:8000/storage/' + dish.image" style="width:200px" :alt="dish.name">
              <img v-else src="https://www.wecanjob.it/moduli/output_immagine.php?id=8444"  style="width:200px" :alt="dish.name">
              <p class="card-text">{{ dish.description }}</p>
              <p>Terminato</p>
            </div>
        </div>
    </div>
</template>

<script>
import cartLogic from "../../cartLogic";
export default {
    name:'CardDish',
    props:{
        dish:{},
        restaurant:{},
    },
    data(){
        return{
            cartLogic,
        }
    }

    
}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';



.link{
    text-decoration:none;
    color: black; 
    img{
        width: 100%;
    }
}

.card{
    min-width: 100px;
    min-height:300px;
    transition: 0.2s;
}

.card:hover{
    -webkit-box-shadow: 5px 5px 6px -1px rgba(0,0,0,0.4); 
    box-shadow: 5px 5px 6px -1px rgba(0,0,0,0.4);
    position:relative;
    animation: card 0.2s linear forwards;
}

@keyframes card {
    from { top: 0px;}
    to{ top:-10px}
}

img{
    transition:ease 0.3s;
    min-height: 160px;
}

 .card:hover img{
    transform:scale(
        1.5
    )
}
</style>

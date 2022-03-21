<template>
    <div class="col my-2">  
            <router-link class="link" :to="{ name: 'restaurant-menu', params: { slug:restaurant.slug } }">
                <div class="card h-100">
                    <div class="overflow-hidden img-wrapper">
                        <img v-if="restaurant.image_cover" class="card-img-top my_class"  :src="'http://127.0.0.1:8000/storage/' + restaurant.image_cover"  :alt="restaurant.name">
                        <img v-else src="https://www.wecanjob.it/moduli/output_immagine.php?id=8444" class="card-img-top my_class" :alt="restaurant.name">
                    </div>
                    <div class="mcard-body p-2">
                        <h5 class="card-title fw-bold my-1">{{ restaurant.name }}</h5>
                        <p>{{restaurant.address}}</p>
                        <p class="card-text">{{ restaurant.phone }}</p>
                    </div>
                </div>
            </router-link>
          </div>
</template>

<script>
export default {
    name:'CardRestaurant',
    props:{
        restaurant:[],
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
<template>
  <div class="col my-2">
    <router-link
      class="link"
      :to="{ name: 'restaurant-menu', params: { slug: restaurant.slug } }"
    >
      <div class="card my_card">
        <div class="overflow-hidden img-wrapper">
          <img
            v-if="restaurant.image_cover"
            class="card-img-top"
            :src="'http://127.0.0.1:8000/storage/' + restaurant.image_cover"
            :alt="restaurant.name"
          />
          <img
            v-else
            src="../../assets/images/bg/placeholder.svg"
            class="card-img-top"
            :alt="restaurant.name"
          />
        </div>
        <div class="card-body p-2">
          <h5 class="card-title fw-bold my-1">{{ restaurant.name }}</h5>
          <p class="mb">{{ restaurant.address }}</p>
          <p
            v-for="category in restaurant.categories"
            :key="category.id"
            class="card-text badge"
            :class="category.name.toLowerCase()"
          >
            {{ category.name }}
          </p>
        </div>
      </div>
    </router-link>
  </div>
</template>

<script>
export default {
  name: "CardRestaurant",
  props: {
    restaurant: [],
  },
};
</script>

<style lang = "scss" scoped>
@import "../../assets/style/variables.scss";

.link {
  text-decoration: none;
  color: black;
  img {
    width: 100%;
  }
}

.my_card {
  min-width: 100px;
  transition: 0.6s;
  height: 100%;
  position: relative;

  .mb {
    margin-bottom: 33px;
  }
  .badge {
    background-color: $_darkGrey;
    position: absolute;
    bottom: 0.7rem;
    left: 0.5rem;
  }
}

.my_card:hover {
  -webkit-box-shadow: -10px 20px 12px -8px rgba(0, 0, 0, 0.25);
  box-shadow: -10px 20px 12px -8px rgba(0, 0, 0, 0.25);
  position: relative;
  animation: card 0.4s linear forwards;
}

@keyframes card {
  from {
    top: 0px;
  }
  to {
    top: -6px;
  }
}

img {
  transition: ease 0.6s;
  height: 160px;
  object-fit: cover;
}

.card:hover img {
  transform: scale(1.3);
}

.card-title {
  font-family: 'Poppins', sans-serif;
  color: $_black;
}


/* categories badge */
.halal {
  background-color: #693231 !important;
}
.colazione {
  background-color: #ffc300 !important;
}
.vegetariano {
  background-color: #43aa8b !important;
}
.messicano {
  background-color: #8f2d56 !important;
}
.dessert {
  background-color: #b8b8ff !important;
}
.indiano {
  background-color: #ca6702 !important;
}
.greco {
  background-color: #4895ef !important;
}
.giapponese {
  background-color: #25693b !important;
}
.cinese {
  background-color: #ff8800 !important;
}
.libanese {
  background-color: #ff206e !important;
}
.americano {
  background-color: #10139b !important;
}
.italiano {
  background-color: $_blue !important;
}
.thailandese {
  background-color: #80b918 !important;
}
.sushi {
  background-color: #f07167 !important;
}
.pizza {
  background-color: #ba181b !important;
}
</style>
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
  transition: 0.2s;
  height: 100%;
  position: relative;
  .mb{
    margin-bottom: 33px;
  }
  .badge{
    background-color: $_darkGrey;
    position: absolute;
    bottom: 0.7rem;
    left: 0.5rem;
  }
}

.my_card:hover {
  -webkit-box-shadow: 5px 5px 6px -1px rgba(0, 0, 0, 0.4);
  box-shadow: 5px 5px 6px -1px rgba(0, 0, 0, 0.4);
  position: relative;
  animation: card 0.2s linear forwards;
}

@keyframes card {
  from {
    top: 0px;
  }
  to {
    top: -10px;
  }
}

img {
  transition: ease 0.3s;
  height: 200px;
  object-fit: cover;
}

.card:hover img {
  transform: scale(1.5);
}
</style>
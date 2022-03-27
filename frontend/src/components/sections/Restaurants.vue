<template>
  <div class="my_container p-4 h-100">

    <div v-if="restaurants.length > 0">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">
        <CardRestaurant
          v-for="restaurant in restaurants"
          :key="restaurant.id"
          :restaurant="restaurant"
        />
      </div>

      <div class="row">
        <div class="overflow-auto">
          <div class="d-flex justify-content-center mt-4">
            <b-pagination
              class="customPagination"
              v-model="variables.page"
              :total-rows="variables.totalPages"
              :per-page="1"
              first-number
              last-number
            ></b-pagination>
          </div>
        </div>
      </div>

    </div>

    <div v-else class="d-flex flex-column justify-content-center align-items-center h-100">
      <img class="w-25" src="../../assets/images/restaurant/sad-restaurant.png" alt="sad restaurant">
      <h3 class="fw-bold mt-2">Ops... Nessun risultato</h3>
    </div>

  </div>
</template>

<script>
import CardRestaurant from "../micro/CardRestaurant";
import variables from "../../variables";

export default {
  name: "Restaurants",
  components: {
    CardRestaurant,
  },
  data() {
    return {
      variables,
      restaurants: [],
    };
  },
  created() {
    this.variables.page = 1;
    if (this.variables.categoriesValue.length > 0) {
      this.restaurantsFilter();
    } else {
      this.getRestaurant();
    }
  },

  methods: {
    getRestaurant() {
      const axios = require("axios").default;
      axios
        .get(
          `http://127.0.0.1:8000/api/restaurants?page=${this.variables.page}`
        )
        .then((response) => {
          this.restaurants = response.data.data;
          this.variables.totalPages = response.data.last_page;
        });
    },

    restaurantsFilter() {
      const axios = require("axios").default;
      axios
        .get("http://127.0.0.1:8000/api/filters", {
          params: {
            categories: this.variables.categoriesValue,
            search: this.variables.search,
            page: this.variables.page,
          },
        })
        .then((response) => {
          this.restaurants = response.data.data;
          this.variables.totalPages = response.data.last_page;
        });
    },
  },

  watch: {
    "variables.categoriesValue"() {
      this.variables.pages = 1;
      if (this.variables.categoriesValue.length > 0 || this.variables.search != '') {
        this.restaurantsFilter();
      } else {
        this.getRestaurant();
      }
    },
    "variables.page"() {
      if (this.variables.categoriesValue.length > 0 || this.variables.search != '') {
        this.restaurantsFilter();
      } else {
        this.getRestaurant();
      }
    },
    "variables.search"(){
      if (this.variables.categoriesValue.length > 0 || this.variables.search != '') {
          this.restaurantsFilter();
        } else {
          this.getRestaurant();
      }
    },
  },
};
</script>

<style lang = "scss">
@import "../../assets/style/variables.scss";

.my_container {
  background-color: $_pink;
  border-radius: 0.4rem;
  min-height: 400px;
}

.customPagination > .page-item {

  & > .page-link {
    color: $_primary;

    &:focus {
      box-shadow: 0 0 0 0.25rem rgba(0, 204, 188, .25);
    }
  }

  &.active > .page-link {
    color: #fff;
    background-color: $_primary;
    border: 1px solid $_primary;

    &:focus {
      box-shadow: 0 0 0 0.25rem rgba(0, 204, 188, .25);
    }
  }

}

</style>
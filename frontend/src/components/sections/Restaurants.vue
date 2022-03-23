<template>
  <div class="my_container p-4">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 ">
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
      if (this.variables.categoriesValue.length > 0) {
        this.restaurantsFilter();
      } else {
        this.getRestaurant();
      }
    },
    "variables.page"() {
      if (this.variables.categoriesValue.length > 0) {
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
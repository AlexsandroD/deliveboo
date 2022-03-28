<template>
  <div class="container_categories">
    <!-- titolo -->
    <h1 class="title">Cosa stai cercando?</h1>
    <!-- search bar -->
    <div class="ms_serch-bar">
      <input
        class="w-100"
        type="text"
        v-model="variables.search"
        placeholder="Cerca ristorante"
      />
    </div>
    <!-- checkboxes -->
    <ul class="checkboxes-container">
      <li class="my-1" v-for="category in categories" :key="category.id">
        <input
          class="form-check-input"
          type="checkbox"
          v-model="variables.categoriesValue"
          :id="category.name"
          :value="category.id"
        />
        <label class="form-check-label" :for="category.name">{{
          category.name
        }}</label>
      </li>
    </ul>
  </div>
</template>

<script>
import variables from "../../variables";
export default {
  name: "Categories",
  data() {
    return {
      categories: [],
      variables,
      // inputIncludes:'',
    };
  },
  created() {
    const axios = require("axios").default;
    axios.get("http://127.0.0.1:8000/api/categories").then((response) => {
      this.categories = response.data;
    });
  },
};
</script>

<style lang = "scss" scoped>
@import "../../assets/style/variables.scss";
@import "../../assets/style/mixins.scss";

.container_categories {
  /* -webkit-box-shadow: 5px 4px 16px -2px rgba(0, 0, 0, 0.53);
  box-shadow: 5px 4px 16px -2px rgba(0, 0, 0, 0.53); */

  h1.title {
    position: absolute;
    top: 180px;

    font-family: "Poppins", sans-serif;
    font-size: 1.4rem;

    background-color: $_cherry;
    color: white;

    margin: 0;
    padding: 0.6rem 1.2rem 0.6rem 0.8rem;
    clip-path: polygon(0 10%, 97% 0, 100% 100%, 0% 100%);
  }

  .ms_serch-bar > input {
    width: 100%;

    padding: 0.2rem 0.5rem;
    border: 1px solid $_primary;
    border-radius: 0.4rem;

    &::placeholder {
      font-family: "Poppins", sans-serif;
      font-size: 1rem;

      color: $_primary;
    }

    &:focus {
      border-color: $_cherry;
      box-shadow: 0 0 0 0.15rem rgba(192, 29, 100, 0.5);
    }

    &:focus-visible {
      outline: none;
    }
  }

  /* lista categories */
  ul.checkboxes-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0 2%;

    list-style: none;
    padding: 0;
    margin: 1rem 0;

    li {
      display: inline;
      color: #fff;

      label {
        width: 100%;

        @include flex-center;

        user-select: none;
        white-space: nowrap;

        padding: 6px 0;
        background-color: $_primary;

        /* margin: 3px 4px; */
        border-radius: 0.4rem;

        font-family: "Poppins", sans-serif;
        font-size: 0.75rem;
        font-weight: 500;

        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -webkit-tap-highlight-color: transparent;
        transition: all 0.2s;

        cursor: pointer;
        text-align: center;

        &::before {
          width: 1.2rem;
          display: none;

          font-style: normal;
          font-variant: normal;
          text-rendering: auto;
          -webkit-font-smoothing: antialiased;
          font-family: "Font Awesome 6 Free";
          font-weight: 900;
          font-size: 12px;
          content: "\f067";

          /* color: $_primary; */
          color: #fff;

          padding: 2px 6px 2px 2px;

          transition: transform 0.3s ease-in-out;
        }
      }

      input[type="checkbox"] {
        display: absolute;
        position: absolute;
        opacity: 0;

        &:hover + label {
          background-color: $_cherry;
        }
        &:checked + label {
          /* background-color: $_primary; */
          background-color: $_cherry;
          color: #fff;

          transition: all 0.2s;
        }

        &:checked + label::before {
          content: "\f00c";

          color: $_white;

          transform: rotate(-360deg);
          transition: transform 0.3s ease-in-out;
        }
      }
    }
  }
}

/* MEDIA QUERIES */
@media screen and (max-width: 320px) {
  .container_categories {
    margin-top: 15px;

    h1.title {
      font-size: 1rem;
    }

    .ms_serch-bar > input {
      margin-top: 1rem;
    }

    ul.edit-container {
      margin: 30px 0 0 0;
      padding: 0;
      /* justify-content: flex-start; */

      li {
        margin: 0;
        padding: 0;
        label {
          margin: 1px;
          padding: 0.2rem 0;

          font-weight: 400;
          width: 7.3rem;
        }
      }
    }
  }
}

@media screen and (min-width: 576px) {
  .container_categories {
    .ms_serch-bar > input {
      &::placeholder {
        font-size: 1rem;
      }
    }

    ul.checkboxes-container {
      grid-template-columns: repeat(5, 1fr);
    }
  }
}

@media screen and (min-width: 768px) {
  .container_categories {
    h1.title {
      top: 280px;
    }

    ul.checkboxes-container {
      grid-template-columns: repeat(5, 1fr);

      li {
        label {
          font-size: 0.9rem;

          &::before {
            display: inline-block;
          }
        }
      }
    }
  }
}

@media screen and (min-width: 992px) {
  .container_categories {
    h1.title {
      top: 270px;

      font-size: 1.6rem;

      padding: 0.8rem 1.4rem 0.8rem 1rem;
    }

    .ms_serch-bar > input {
      padding: 0.6rem 1rem;

      &::placeholder {
        font-size: 1.2rem;
      }
    }

    ul.checkboxes-container {
      grid-template-columns: 1fr;

      li {
        label {
          font-size: 1.2rem;

          &::before {
            width: 2rem;
            font-size: 1rem;
          }
        }
      }
    }
  }
}
</style>
<template>
  <div class="container">
            <!-- Check boxes  -->
            <div class="form-group">
                <h2 class="d-block">Categories</h2>
                <ul class="edit-container">
              
                    <li v-for="category in categories" :key="category.id">
                        <input class="form-check-input" type="checkbox" v-model="variables.categoriesValue" :id="category.name" :value="category.id">
                        <label class="form-check-label" :for="category.name">{{category.name}}</label>
                    </li>
               
                </ul>
             </div>
  </div>
</template>

<script>
import variables from "../../variables";
export default {
    name:"Categories",
    data(){
        return{
            categories:[],
            variables,
        }
    },
    created(){
        const axios = require('axios').default;
        axios.get('http://127.0.0.1:8000/api/categories')
        .then((response) => {
            this.categories = response.data;
        })
    }
}
</script>

<style>

</style>
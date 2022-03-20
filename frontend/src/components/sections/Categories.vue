<template>
<div class="container">
    <!-- Check boxes  -->
    <!-- <div class="form-group"> -->
    
        <!-- <div class="cont-search">
            <label class="search-btn" for="search" @click="find()"><i class="fas fa-search"></i></label>
            <input id="search" class="search" type="text" v-model="inputIncludes" @click.enter="find()" placeholder=" Cerca o inizia una nuova chat">
        </div> -->
    <!-- <h2 class="d-block">Cosa stai cercando?</h2> -->
    <b-form-group>     
        <ul class="edit-container">
        
            <li v-for="category in categories" :key="category.id">
                <input class="form-check-input" type="checkbox" v-model="variables.categoriesValue" :id="category.name" :value="category.id">
                <label class="form-check-label" :for="category.name">{{category.name}}</label>
            </li>
        
        </ul>
    </b-form-group>
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
    // inputIncludes:'',
        }
    },
    created(){
        const axios = require('axios').default;
        axios.get('http://127.0.0.1:8000/api/categories')
        .then((response) => {
            this.categories = response.data;
        })
    },

    
        //     find: function(i) {
        //     inputIncludes = this.inputIncludes.toLowerCase();
        //     names = this.categories[i].name.toLowerCase();
        //     if(names.includes(inputIncludes)){
        //         return true
        //     }else{
        //         return false
        //     }

        // },

        // find: function(){
        //     this.categories.forEach(element => {
        //         element.visible
        //     });
        // }
}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';
.edit-container{
    
    list-style: none;
    display: flex;
    flex-direction: column;
    height: 90px;
    flex-wrap: wrap;
    li{
    /* display: flex; */
    
    }
}
</style>
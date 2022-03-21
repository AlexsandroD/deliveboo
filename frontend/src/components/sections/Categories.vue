<template>
<div class="container">
    <div class="title">
        <h1>Cosa stai cercando?</h1>
    </div>
    <!-- Check boxes  -->
    <!-- <div class="form-group"> -->
    
        <!-- <div class="cont-search">
            <label class="search-btn" for="search" @click="find()"><i class="fas fa-search"></i></label>
            <input id="search" class="search" type="text" v-model="inputIncludes" @click.enter="find()" placeholder=" Cerca o inizia una nuova chat">
        </div> -->
    <!-- <h2 class="d-block">Cosa stai cercando?</h2> -->

    <!-- <b-form-group>
        <ul class="edit-container">
        
            <li v-for="category in categories" :key="category.id">
                <input class="form-check-input" type="checkbox" v-model="variables.categoriesValue" :id="category.name" :value="category.id">
                <label class="form-check-label" :for="category.name">{{category.name}}</label>
            </li>
        
        </ul>
    </b-form-group> -->

    <!-- categories checkbox -->
    <div class="form-group">
        <ul class="edit-container" >
            <li  v-for="category in categories" :key="category.id">
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
.container{
    .title{
        color: $_blue;
        /* text-shadow: 2px 2px 4px black; */
        padding: 20px 0;
    }
    /* .edit-container{
        list-style: none;
        display: flex;
        flex-direction: column;
        height: 90px;
        flex-wrap: wrap;
        li{
        display: flex;
        }
    } */

  p.under-title {
    font-size: 1rem;
    font-weight: 400;
    color: $_primary;
  }
/* lista categories */
    .edit-container{
        display: flex;
        justify-content: center;
    }
        ul.edit-container {
        /* @include flex-center; */
        flex-wrap: wrap;
        
        list-style: none;
        
        padding: .6rem 0 0;
        
        li{
            display: inline;
            color: $_primary;
            label{
            display: inline-block;
            width: 8.5rem;
            
            user-select: none;
            white-space: nowrap;
        
            margin: 3px 0px;
            padding: 8px 12px;
            border: 2px solid $_primary;
            border-radius: 25px;
        
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -webkit-tap-highlight-color: transparent;
            transition: all .2s;
            
            cursor: pointer;
        
            &::before {
                width: 1.2rem;
                display: inline-block;
            
                font-style: normal;
                font-variant: normal;
                text-rendering: auto;
                -webkit-font-smoothing: antialiased;
                font-family: "Font Awesome 6 Free";
                font-weight: 900;
                font-size: 12px;
                content: "\f067";
            
                color: $_primary;
            
                padding: 2px 6px 2px 2px;
            
                transition: transform .3s ease-in-out;
                }
            }
        
            input[type="checkbox"] {
            display: absolute;
            position: absolute;
            opacity: 0;
            
            &:checked + label {
                background-color: $_primary;
                color: #fff;
            
                border: 2px solid $_darkerPrimaryHover;
                
                transition: all .2s;
            }
        
            &:checked + label::before {
                content: "\f00c";
            
                color: $_white;
            
                transform: rotate(-360deg);
                transition: transform .3s ease-in-out;
            }
            }
        }

    }
    
}
</style>
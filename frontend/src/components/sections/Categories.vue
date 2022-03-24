<template>
<div class="my_container">
    <div class="title">
        <h1>Cosa stai cercando?</h1>
    </div>
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
}
</script>

<style lang = "scss" scoped>
@import '../../assets/style/variables.scss';
.my_container{
    .title{
        h1{
            margin-top: -50px;
            position: absolute;
            background-color: $_cherry;
            color: white;
            padding: 0.4rem 1rem;
            clip-path: polygon(0 10%, 97% 0, 100% 100%, 0% 100%);
            /* text-transform: uppercase; */
        }
        color: $_blue;
        /* text-shadow: 2px 2px 4px black; */
        padding: 20px 0;
        
    }

    p.under-title {
        font-size: 1rem;
        font-weight: 400;
        color: $_primary;
    }
    /* lista categories */
    .edit-container{
        display: flex;
        justify-content: center;
        margin: 30px 0 27px 0;
    }
    ul.edit-container {
        /* @include flex-center; */
        flex-wrap: wrap;
        list-style: none;
        padding: .6rem 0 0;

        li{
            display: inline;
            /* color: $_primary; */
            color: #fff;

            label{
                display: inline-block;
                width: 8.5rem;
                
                user-select: none;
                white-space: nowrap;
            
                padding: 8px 12px;
                border: 2px solid $_primary;
                background-color: $_primary;

                margin: 3px 4px;
                border-radius: 0.4rem;
                font-weight: 500;
            
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                -webkit-tap-highlight-color: transparent;
                transition: all .2s;
                
                cursor: pointer;
                text-align: center;
            
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
                
                    /* color: $_primary; */
                    color: #fff;
                
                    padding: 2px 6px 2px 2px;
                
                    transition: transform .3s ease-in-out;
                }
            }
                
            input[type="checkbox"]{
                display: absolute;
                position: absolute;
                opacity: 0;
                &:hover + label{
                    background-color: $_cherry;
                    border: 1.5px solid $_cherry;
                }
                
                &:checked + label {
                    /* background-color: $_primary; */
                    background-color: $_cherry;
                    color: #fff;
                
                    /* border: 2px solid $_darkerPrimaryHover; */
                    border: 2px solid $_cherry;
                    
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
@media screen and (max-width: 329px) {
    .my_container{
        margin-top: 15px;
        ul.edit-container{
            margin: 30px 0 0 0;
            padding: 0;
            /* justify-content: flex-start; */

            li{
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
</style>
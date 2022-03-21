import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
import "bootstrap/dist/css/bootstrap.css";
import 'bootstrap-vue/dist/bootstrap-vue.css';

import Vue from 'vue'
import App from './App.vue'
import router from "./router"
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

// Vue.config.productionTip = false


//     window.onscroll = function() {scrollFunction()};
// function scrollFunction() {
//   if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    
//     document.getElementById("navbar").style.background = "#501e27";
//   } else {
   
//     document.getElementById("navbar").style.background = "none";
//   }
//   }

new Vue({
    el: '#navbar',
    data () {
      return {
        view: {
          topOfPage: true
        }
      }
    },
    beforeMount() {
      window.addEventListener('scroll', this.handleScroll)
    },
    methods: {
      handleScroll(){
        if(window.pageYOffset>0){
          if(this.view.topOfPage) this.view.topOfPage = false
        } else {
          if(!this.view.topOfPage) this.view.topOfPage = true
        }
      }
    },
  })
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
import "bootstrap/dist/css/bootstrap.css";
import 'bootstrap-vue/dist/bootstrap-vue.css';
import ScrollAnimation from './directives/scrollanimation';
import ScrollAnimation2 from './directives/scrollanimation2';
import ScrollAnimation3 from './directives/scrollanimation3';
Vue.directive('scrollanimation', ScrollAnimation);
Vue.directive('scrollanimation2', ScrollAnimation2);
Vue.directive('scrollanimation3', ScrollAnimation3);




import Vue from 'vue'
import App from './App.vue'
import router from "./router"
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)


Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router
}).$mount('#app')

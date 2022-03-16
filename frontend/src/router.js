import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/pages/Home.vue";
import RestaurantMenu from "./components/pages/RestaurantMenu.vue";


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },

        {
            path: "/:slug",
            name: "restaurant-menu",
            component: RestaurantMenu
        },
    ]
    
});

export default router;
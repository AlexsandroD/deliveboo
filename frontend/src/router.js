import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/pages/Home.vue";
import Banana from "./components/pages/Banana.vue";


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },

        {
            path: "/banana",
            name: "banana",
            component: Banana
        },
    ]
    
});

export default router;
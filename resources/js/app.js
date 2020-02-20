require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import App from './views/App'
import About from './views/About'
import Home from './views/Home'
import SideNav from "./views/SideNav";



const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/andy',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        },
    ],
});


const app = new Vue({
    el: '#app',
    components: { App },
    router,
});


const sidenav = new Vue({
    el: '#sidenav',
    components: { SideNav },
});

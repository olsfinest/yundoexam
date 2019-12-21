/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


import Home from './components/home'
import Adduser from './components/users/adduser'
import Allusers from './components/users/allusers'
import Edituser from './components/users/edituser'


// this are all the single page application router links of the site

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Home
        },

        {
            path: '/home/admin/adduser',
            name: 'adduser',
            component: Adduser
        },

        {
            path: '/home/admin/allusers',
            name: 'allusers',
            component: Allusers
        },

        {
            path: '/home/admin/edituser',
            name: 'edituser',
            component: Edituser
        },
        
       
    ],
});

const app = new Vue({
    el: '#app',
    components: { Home },
    router,
});
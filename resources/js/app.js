require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store';

import App from './App.vue';
import Home from './pages/Home.vue';
import Inplay from './pages/Inplay.vue';
import EventDetail from './pages/EventDetail.vue';

Vue.use(VueRouter)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('app', require('./App.vue').default);

const router = new VueRouter({
    // mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            props: (route) => ({
                currentRoute : 'home',
                ...route.params
            })
        },
        {
            path: '/inplay/:sportID',
            name: 'inplay',
            component: Inplay,
            props: (route) => ({
                currentRoute : 'inplay',
                ...route.params
            })
        },
        {
            path: '/s/:sportID/IP/:eventID',
            name: 'event_detail',
            component: EventDetail,
            props: (route) => ({
                currentRoute : 'event_detail',
                ...route.params
            })
        },
    ]
})
const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store,
});
import Vue from 'vue';
import Router from "vue-router";

import index from './components/index'

Vue.use(Router);

const routes = [
    {
        path: '/',
        component: index
    }
];

export default new Router({
    mode:'history',
    routes
})

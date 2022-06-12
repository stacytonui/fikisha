require('./bootstrap');
import Vue from 'vue/dist/vue';
window.Vue = require('vue').default;
import 'vuejs-datatable/dist/themes/bootstrap-4.esm';
import { VuejsDatatableFactory } from 'vuejs-datatable';
Vue.use( VuejsDatatableFactory );
import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';




import axios from 'axios';
import {routes} from './routes';
import $ from 'jquery'

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
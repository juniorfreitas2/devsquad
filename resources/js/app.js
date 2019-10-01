require('./bootstrap');

window.Vue = require('vue')

const axios = require('axios');

import DataGrid from './components/DataGrid.vue';
import { ValidationObserver, ValidationProvider, extend } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';
import money from 'v-money'

Vue.use(money, {precision: 4})

extend('required', {
    ...required,
    message: 'Este campo é obrigatório'
});

Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);
Vue.component('dataGrid', DataGrid);

// const app = new Vue({
//     el: '#app',
//     data: {
//         message: 'Hello Vue!'
//     }
// });

require('./bootstrap');

window.Vue = require('vue')

import ExampleComponent from './components/DataGrid.vue';

Vue.component('teste', ExampleComponent)

const app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!'
    }
});

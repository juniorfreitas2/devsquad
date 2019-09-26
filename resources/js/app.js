require('./bootstrap');

window.Vue = require('vue')

Vue.component('data-grid', require('./components/DataGrid.vue'))

const app = new Vue({
    el: '#app',
    methods: {
    },
    data: {
        message: 'Hello Vue!'
    }
});

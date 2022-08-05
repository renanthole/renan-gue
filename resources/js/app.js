require('./bootstrap');
window.Vue = require('vue').default;
import Vue from 'vue';


Vue.component('card-component', require('./components/CardComponent').default);

new Vue({
    el: "#app"
});
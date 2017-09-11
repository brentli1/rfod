import './bootstrap';
import Vue from 'vue';
import Vuetify from 'vuetify'
import App from './App.vue';

Vue.use(Vuetify);

const app = new Vue({
    el: '#app',
    render: h => h(App)
});

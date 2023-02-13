
require('./bootstrap');

import Vue from 'vue';
import App from './pages/App';

require('chart.js');
require('hchs-vue-charts');
Vue.use(VueCharts);

window.Vue = Vue;
window.app = new Vue({...App}).$mount('#app');

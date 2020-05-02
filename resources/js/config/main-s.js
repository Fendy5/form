window.Vue = require('vue');
import S from '@/views/s/Index'
import '@/plugins/vant.js';
import 'vant/lib/index.css';
import axios from "axios";


Vue.component('display', S);
axios.defaults.baseURL = 'http://192.168.1.102:8081/';
Vue.prototype.$http = axios;
Vue.config.productionTip = false;



const app = new Vue({
  el: '#app'
});

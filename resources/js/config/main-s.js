import Vue from 'vue';
import S from '@/views/s/Index'
import '@/plugins/vant.js';
import 'vant/lib/index.css';
import axios from "axios";


Vue.use(S);
Vue.component('display', S);
axios.defaults.baseURL = 'http://192.168.31.241:8081/';
Vue.prototype.$http = axios;
Vue.config.productionTip = false;

const app = new Vue({
  el: '#app',
  components: {
    S
  }
});

window.Vue = require('vue');

import './plugins/vant.js';
import 'vant/lib/index.css';
import axios from 'axios'

import '../../public/font/iconfont.css'
import './asset/css/global.css'

axios.defaults.baseURL = 'http://localhost:8088/api/';
Vue.prototype.$http = axios;

Vue.component('display',require('./components/Display').default);

const app = new Vue({
    el: '#app',
});

import Vue from 'vue';
import axios from 'axios'
import NProgress from 'nprogress'
import 'nprogress/nprogress.css'
axios.defaults.baseURL = 'http://192.168.1.102:8081/';
axios.interceptors.request.use(config => {
  NProgress.start();
  return config
});
axios.interceptors.response.use(config => {
  NProgress.done();
  return config
});
Vue.prototype.$http = axios;
Vue.config.productionTip = false;

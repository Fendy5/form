import Vue from "vue";

import router from "@/router/main-home";
import App from '@/layout/Home'
import '@/plugins/element.js'
import '@/plugins/vant.js';
import 'vant/lib/index.css';
import 'element-ui/lib/theme-chalk/index.css';
import '@/utils/request'
import '@/asset/fonts/iconfont.css'
import '@/asset/css/global.css'
import VueQriously from 'vue-qriously'
Vue.use(VueQriously);

const app = new Vue({
  el: '#app',
  router,               // <-- register mainHome with Vue
  render: (h) => h(App) // <-- render App component
});

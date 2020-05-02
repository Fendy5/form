import router from "@/router/main-login";

window.Vue = require('vue');

import Index from '@/views/login/Index'
import '@/utils/request'
import '@/plugins/element.js'
import 'element-ui/lib/theme-chalk/index.css';

const app = new Vue({
  el: '#app',
  router,
  render: (h) => h(Index) // <-- render App component
});


window.Vue = require('vue');

import Login from '@/views/login/Index'
import '@/utils/request'
import '@/plugins/element.js'
import 'element-ui/lib/theme-chalk/index.css';

const app = new Vue({
  el: '#app',
  render: (h) => h(Login) // <-- render App component
});

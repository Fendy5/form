import Vue from "vue";
import VueRouter from "vue-router";

const Forget = () => import(/* webpackChunkName: "create" */ '../views/login/Forget');
const Login = () => import(/* webpackChunkName: "create" */ '../views/login/Login');

Vue.use(VueRouter);

const mainLogin = new VueRouter({

  routes: [
    { path: '/', component: Login ,meta: {title: '用户登录'}},
    { path: '/forget',name:'forget', component: Forget ,meta: {title: '忘记密码~'}}
  ]
});
mainLogin.beforeEach((to, from, next) => {
  /* 路由发生变化修改页面title */
  if (to.meta.title) {
    document.title = to.meta.title
  }
  next()
});
export default mainLogin;

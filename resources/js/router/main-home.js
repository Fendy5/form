import Vue from "vue";
import VueRouter from "vue-router";

const Form = () => import(/* webpackChunkName: "create" */ '../views/create/Form');
const Question = () => import(/* webpackChunkName: "create" */ '../views/create/Question');
const Exam = () => import(/* webpackChunkName: "create" */ '../views/create/Exam');
const Vote = () => import(/* webpackChunkName: "create" */ '../views/create/Vote');
const MyQuestion = () => import(/* webpackChunkName: "create" */ '../views/mine/MyQuestion');
const MyProfile = () => import(/* webpackChunkName: "create" */ '../views/mine/MyProfile');
const StatisticForm = () => import(/* webpackChunkName: "create" */ '../views/statistic/Index');
const EditForm = () => import(/* webpackChunkName: "create" */ '../views/edit/EditForm');
const Upgrade = () => import(/* webpackChunkName: "create" */ '../views/mine/Upgrade');
const Order = () => import(/* webpackChunkName: "create" */ '../views/mine/Order');
// const Statistic = () => import(/* webpackChunkName: "create" */ '../layout/Statistic');
// const Recovery = () => import(/* webpackChunkName: "create" */ '../views/mine/Recovery');
// const Released = () => import(/* webpackChunkName: "create" */ '../views/mine/Released');


// import Create from "@/layout/Create";

Vue.use(VueRouter);

const mainHome = new VueRouter({
  routes: [
        { path: '/form', component: Form },
        { path: '/question', component: Question },
        { path: '/exam', component: Exam },
        { path: '/vote', component: Vote },
        { path: '/my_question', component: MyQuestion,meta: {title: '我的问卷'}},
        { path: '/edit_form/:id', component: EditForm ,meta: {title: '编辑问卷'}},
        { path: '/statistic/:id', component: StatisticForm ,meta: {title: '统计分析'}},
        { path: '/my_profile', component: MyProfile ,meta: {title: '个人信息'}},
        { path: '/upgrade', component: Upgrade ,meta: {title: '开通会员'}},
        { path: '/order', component: Order ,meta: {title: '交易信息'}},
  ]
});
mainHome.beforeEach((to, from, next) => {
  /* 路由发生变化修改页面title */
  if (to.meta.title) {
    document.title = to.meta.title
  }
  next()
});
export default mainHome;

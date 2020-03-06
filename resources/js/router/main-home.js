import Vue from "vue";
import VueRouter from "vue-router";

const Form = () => import(/* webpackChunkName: "create" */ '../views/create/Form');
const Question = () => import(/* webpackChunkName: "create" */ '../views/create/Question');
const Exam = () => import(/* webpackChunkName: "create" */ '../views/create/Exam');
const Vote = () => import(/* webpackChunkName: "create" */ '../views/create/Vote');
const MyQuestion = () => import(/* webpackChunkName: "create" */ '../views/mine/MyQuestion');
const EditForm = () => import(/* webpackChunkName: "create" */ '../views/edit/EditForm');
// const Recovery = () => import(/* webpackChunkName: "create" */ '../views/mine/Recovery');
// const Released = () => import(/* webpackChunkName: "create" */ '../views/mine/Released');


import Create from "@/layout/Create";

Vue.use(VueRouter);

const mainHome = new VueRouter({
  routes: [
    {
      path: "/",
      component: Create,
      children: [
        { path: '/form', component: Form },
        { path: '/question', component: Question },
        { path: '/exam', component: Exam },
        { path: '/vote', component: Vote },
        { path: '/my_question', component: MyQuestion,meta: {title: '我的问卷'}},
        { path: '/edit_form/:id', component: EditForm ,meta: {title: '编辑问卷'}}
        // { path: '/released', component: Released },
        // { path: '/recovery', component: Recovery }
      ]
    }
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

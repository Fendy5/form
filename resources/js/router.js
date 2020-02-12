import Vue from "vue";
import VueRouter from "vue-router";

const Form = () => import(/* webpackChunkName: "create" */ './components/home/create/Form');
const Question = () => import(/* webpackChunkName: "create" */ './components/home/create/Question');
const Exam = () => import(/* webpackChunkName: "create" */ './components/home/create/Exam');
const Vote = () => import(/* webpackChunkName: "create" */ './components/home/create/Vote');

import Create from "./components/home/Create";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: "/",
            component: Create,
            children: [
                { path: '/form', component: Form },
                { path: '/question', component: Question },
                { path: '/exam', component: Exam },
                { path: '/vote', component: Vote },
            ]
        }
    ]
});

export default router;

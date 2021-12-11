require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import CommentsCreate from './components/Comments/Create.vue'
import CommentIndex from './components/Comments/Index.vue'
import CommentEdit from './components/Comments/Edit.vue'
import VueSweetalert2 from 'vue-sweetalert2';
import App from './components/App.vue'
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path:'/',
            component: CommentIndex,
            name: 'comments.index'
        },{
            path:'/comments/create',
            component: CommentsCreate,
            name: 'comments.create'
        },{
            path:'/comments/edit/:id',
            component: CommentEdit,
            name: 'comments.edit'
        }
    ]
})

Vue.component('comments-index',require('./components/Comments/Index.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});

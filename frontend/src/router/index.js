import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Login from '@/components/auth/Login'
import Register from '@/components/auth/Register'
import Restore from '@/components/auth/Restore'
import ListArticle from '@/components/content/articles/ListArticle'
import DetailArticle from '@/components/content/articles/DetailArticle'
import Contacts from '@/components/content/contacts/Home'
import AboutUs from '@/components/content/aboutus/Home'
Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/register',
      name: 'Register',
      component: Register
    },
    {
      path: '/restore',
      name: 'Restore',
      component: Restore
    },
    {
      path: '/articles',
      name: 'ListArticles',
      component: ListArticle
    },
    {
      path: '/articles/:id/',
      name: 'DetailArticle',
      component: DetailArticle,
      props: true
    },
    {
      path: '/contacts',
      name: 'Contacts',
      component: Contacts
    },
    {
      path: '/aboutus',
      name: 'About us',
      component: AboutUs
    }
  ],
  mode: 'history'
})

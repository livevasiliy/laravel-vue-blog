import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Login from '@/components/auth/Login'
import Register from '@/components/auth/Register'
import ListArticle from '@/components/content/articles/ListArticle'
import DetailArticle from '@/components/content/articles/DetailArticle'
import Portfolio from '@/components/content/portfolio/Home'
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
      path: '/portfolio',
      name: 'Portfolio',
      component: Portfolio
    }
  ],
  mode: 'history'
})

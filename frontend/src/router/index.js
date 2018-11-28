import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Login from '@/components/auth/Login'
import Register from '@/components/auth/Register'
import Restore from '@/components/auth/Restore'
import Logout from '@/components/auth/Logout'
import Profile from '@/components/auth/Profile'
import ListArticle from '@/components/content/articles/ListArticle'
import DetailArticle from '@/components/content/articles/DetailArticle'
import Contacts from '@/components/content/contacts/Home'
import AboutMe from '@/components/content/aboutme/Home'
import Dashboard from '@/components/admin-panel/Dashboard'
import EditPost from '@/components/admin-panel/EditPost'
import AddNewPost from '@/components/admin-panel/AddNewPost'
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
      path: "/logout",
      name: 'Logout',
      component: Logout
    },
    {
      path: '/profile/:id/',
      name: 'Profile',
      component: Profile,
      props: true
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
      path: '/aboutme',
      name: 'About me',
      component: AboutMe
    },
    {
      path: '/dashboard',
      name: 'Dashboard',
      component: Dashboard,
      meta: { requiresAuth: true},
      beforeEach: (to, from, next) => {
        if (to.matched.some(route => route.meta.requiresAuth) && !this.$store.isLoggedIn) {
          next({name: 'Login'});
          return;
        }

        if (to.path === '/login' && this.$store.isLoggedIn) {
          next({name: 'Dashboard'});
          return;
        }
        next();
      }
    },
    {
      path: '/dashboard/post/:postId/edit',
      name: 'EditPost',
      component: EditPost,
      props: true
    },
    {
      path: '/dashboard/post/new',
      name: 'AddNewPost',
      component: AddNewPost
    }
  ],
  mode: 'history'
})

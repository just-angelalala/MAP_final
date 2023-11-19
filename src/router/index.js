import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Register from '../components/Register.vue'
import Login from '../views/Login.vue';
import Sidebar from '../views/Sidebar.vue'
import Dashboard from '../components/Dashboard.vue'
import SalesOrder from '../components/SalesOrder.vue'
import SalesHistory from '../components/SalesHistory.vue'
import UserAccount from '../components/UserAccount.vue'
import Product from '../components/Product.vue'
import Home from '../components/Home.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home //lalagyan ng page
  },
  {
    path: '/register',
    name: 'register',
    component: Register
  },
  {
    path: '/login',
    name: 'login',
    component: Login
  },  
  {
    path: '/sidebar',
    name: 'sidebar',
    component: Sidebar
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard
  },
  {
    path: '/product',
    name: 'product',
    component: Product
  },
  {
    path: '/sales-order',
    name: 'sales-order',
    component: SalesOrder
  },
  {
    path: '/sales-history',
    name: 'sales-history',
    component: SalesHistory
  },
  {
    path: '/user-account',
    name: 'user-account',
    component: UserAccount
  },
  {
    path: '/logout',
    name: 'logout',
    component: Home
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

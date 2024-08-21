import { createRouter, createWebHistory } from 'vue-router'
import { admin } from './admin'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [...admin]
})

export default router

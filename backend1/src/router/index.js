import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'DefaultLayout',
      component: () => import("@/components/DefaultLayout.vue"),
      children: [
        {
          path: '/',
          name: 'Home',
          component: () => import("@/views/Home.vue")
        },
        {
          path: '/by-name/:name?',
          name: 'ByName',
          component: () => import("@/views/MealsByName.vue")
        },
        {
          path: '/ingredients',
          name: 'Ingredients',
          component: () => import("@/views/Ingredients.vue")
        },
        {
          path: '/by-ingredient/:ingredient?',
          name: 'ByIngredient',
          component: () => import("@/views/MealsByIngredients.vue")
        },
        {
          path: '/by-letter/:letter?',
          name: 'ByLetter',
          component: () => import("@/views/MealsByLetter.vue")
        },
        {
          path: '/meal/:id',
          name: 'MealDetail',
          component: () => import('@/views/MealDetail.vue')
        }
      ]
    },
    {
      path: '/guest',
      name: 'GuestLayout',
      component: () => import('@/components/GuestLayout.vue')
    }
  ]
})

export default router
